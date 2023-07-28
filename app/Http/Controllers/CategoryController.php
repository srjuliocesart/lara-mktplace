<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(
        private Category $category
    ) {
    }

    public function index($slug)
    {
        $category = $this->category->whereSlug($slug)->first();
        //dd($category);
        return view('category', compact('category'));
    }
}
