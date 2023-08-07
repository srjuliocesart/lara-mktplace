<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Traits\UploadTrait;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    use UploadTrait;
    public function __construct(
        private Product $product
    ){
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        if(!$user->store()->exists()){
            flash('É preciso criar uma loja para cadastrar produtos!')->warning();
            return redirect()->route('admin.stores.index');
        }
        $products = $user->store->products()->paginate(10);

        return view('admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all(['id','name']);
        return view('admin.products.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $data = $request->all();
        $categories = $request->get('categories',null);

        $data['price'] = formatMoneyToDatabase($data['price']);

        $request->validated();
        $store = auth()->user()->store;
        $product = $store->products()->create($data);
        $product->categories()->sync($categories);

        if($request->hasFile('photos')){
//            dd($request->file('photos'));
            $images = $this->uploadImages($request->file('photos'), 'image');
            $product->photos()->createMany($images);
        }

        flash('Produto criado com sucesso!')->success();
        return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $product)
    {
        $product = $this->product->findOrFail($product);
        $categories = Category::all(['id','name']);
        return view('admin.products.edit',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, string $product)
    {
        $request->validated();
        $data = $request->all();
        $categories = $request->get('categories',null);
        $product = $this->product->findOrFail($product);
        if(!is_null($categories)){
            $product->categories()->sync($categories);
        }
        if($request->hasFile('photos')){
            $images = $this->uploadImages($request->file('photos'), 'image');
            $product->photos()->createMany($images);
        }
        $product->update($data);

        flash('Produto atualizado com sucesso!')->success();
        return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $product)
    {
        $product = $this->product->findOrFail($product);
        $product->delete();

        flash('Produto apagado com sucesso!')->success();
        return redirect()->route('admin.products.index');
    }
}
