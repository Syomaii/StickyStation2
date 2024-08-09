<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard')->with('title', 'Admin Dashboard');
    }

    public function orders()
    {
        $orders = Order::all();
        return view('admin.orders', compact('orders'))->with('title', 'Orders');
    }

    public function products()
    {
        $products = Product::all();
        return view('admin.products', compact('products'))->with('title', 'Products');
    }

    public function users()
    {
        $users = User::all();
        return view('admin.users', compact('users'))->with('title', 'Users');
    }
}
