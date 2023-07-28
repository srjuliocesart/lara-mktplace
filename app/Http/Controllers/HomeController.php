<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(
        private Product $product
    ){
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = $this->product->limit(6)->orderBy('id','DESC')->get();
        $stores = Store::limit(3)->orderBy('id','DESC')->get();

        return view('welcome', compact('products','stores'));
    }

    public function single($slug)
    {
        $product = $this->product->whereSlug($slug)->first();

        return view('single',compact('product'));
    }
}
