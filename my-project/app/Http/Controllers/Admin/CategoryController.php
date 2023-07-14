<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(
        private Category $category
    ){
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = $this->category->paginate(10);

        return view('admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $request->validated();
        $data = $request->all();

        $this->category->create($data);

        flash('Categoria criada com sucesso!')->success();
        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $category)
    {
        $category = $this->category->findOrFail($category);
        return view('admin.categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $category)
    {
        $request->validated();
        $data = $request->all();
        $category = $this->category->findOrFail($category);
        $category->update($data);

        flash('Produto atualizado com sucesso!')->success();
        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $category)
    {
        $category = $this->category->findOrFail($category);
        $category->delete();

        flash('Produto apagado com sucesso!')->success();
        return redirect()->route('admin.categories.index');
    }
}
