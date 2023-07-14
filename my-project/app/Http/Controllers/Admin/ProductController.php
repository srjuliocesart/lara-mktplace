<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(
        private Product $product
    ){
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = $this->product->paginate(10);

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
        $request->validated();
        $data = $request->all();
        $store = auth()->user()->store;
        $product = $store->products()->create($data);
        $product->categories()->sync($data['categories']);

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
        $product = $this->product->findOrFail($product);
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
