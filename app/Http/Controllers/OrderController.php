<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    //OrderController.php
    public function index()
    {
        $orders = Order::with('products')->where('user_id', auth()->id())->latest()->get();
        return view('orders', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::with('products')->where('user_id', auth()->id())->findOrfail($id);
        return view('order_detail', compact('order'));
    }
}
