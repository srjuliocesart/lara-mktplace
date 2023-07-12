<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        $stores = Store::all(['id','name']);
        return view('admin.products.create',compact('stores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $store = Store::find($data['store']);
        $store->products()->create($data);

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
        return view('admin.products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $product)
    {
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
