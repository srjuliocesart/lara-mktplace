<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserOrder;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function __construct(
        private UserOrder $order
    ) {
    }

    public function index()
    {
        $orders = auth()->user()->store->orders()->paginate(15);
        return view('admin.orders.index', compact('orders'));
    }
}
