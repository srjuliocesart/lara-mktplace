<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;

class StoreController extends Controller
{
    public function __construct(
        private Store $store
    ) {
    }

    public function index($slug)
    {
        $store = $this->store->whereSlug($slug)->first();

        return view('store', compact('store'));
    }
}
