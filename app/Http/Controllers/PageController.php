<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $products = Product::inRandomOrder()->where('product_status', 'featured')->paginate(4);
        $data = [
            'title' => 'Home',
            'products' => $products,
        ];

        return view('index', $data);
    }

    public function products(){
        $products = Product::where('product_status', 'available')->paginate(6);

        return view('products', compact('products'))->with('title', 'Products');
    }

    public function cart(){
        return view('cart')->with('title', 'Cart');
    }

    public function register()
    {
        return view('register')->with('title', 'Register');
    }

    public function login()
    {
        return view('login')->with('title', 'Login');
    }

    public function addProduct(){

        return view('add_product')->with('title', 'Add product');
    }

    public function productDetails($id)
    {
        $product = Product::findOrFail($id);
        $featuredProducts = Product::inRandomOrder()->where('product_status', 'featured')->paginate(6);
        $data = [
            'product' => $product,
            'products' => $featuredProducts,
            'title' => 'Product Details'
        ];

        return view('product_details', $data);
    }

    public function editProduct($id)
    {
        $product = Product::findOrFail($id);

        $data = [
            'product'=> $product,
            'title'=>'Edit Product'
        ];
        return view('edit_product', $data); 
    }

    public function profile()
    {
        $user = auth()->user();
        return view('profile', compact('user'))->with('title', 'Profile');
    }

    public function purchaseHistory()
    {
        $purchaseHistories = Order::where('user_id', auth()->id())->get();

        return view('order', compact('purchaseHistories'))->with('title', 'Purchase History');
    }
}
