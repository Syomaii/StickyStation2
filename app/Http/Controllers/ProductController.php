<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    // ...

    public function myProducts()
    {
        $products = Product::where('user_id', Auth::id())->get();
        return view('my_products', compact('products'))->with('title', 'My Products');
    }

    public function product($id)
    {
        $product = Product::findOrFail($id);
        $products = Product::inRandomOrder()->where('product_status', 'featured')->take(8)->get();

        return view('products')->with('product', $product)->with('products', $products)->with('title', 'Product');; 
    }

    public function featuredProducts()
    {
        $products = Product::where('product_status', 'featured')->paginate(6);
        return view('products', compact('products'));
    }

    public function addProductPost(Request $request)
    {
        $data = $request->validate([
            'product_name' => 'required',
            'product_quantity' => 'required|numeric|between:1,500',
            'product_price'  => 'required|numeric|min:1|max:99999',
            'product_description'  => 'required',
            'product_type' => 'required',
            'product_status' => 'required',
            'product_image'  => 'required|mimes:jpg,png,jpeg,gif|max:2048'
        ]);

        if ($request->hasFile('product_image')) {
            $image = $request->file('product_image');
            $imagePath = $image->store('photos', 'public'); 
            $data['product_image'] = $imagePath;
        }

        $data['user_id'] = Auth::id();

        Product::create($data);
        return redirect()->route('products.store')->with('success', 'Product Added Successfully!');
    }


    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('edit_product', compact('product'))->with('title', 'Product Updated');;
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'product_name' => 'required|string|max:255',
            'product_quantity' => 'required|integer|min:0',
            'product_price' => 'required|numeric|min:0',
            'product_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'product_description' => 'required|string',
            'product_status' => 'required|string',
            'product_type' => 'required|string',
        ]);

        $product->product_name = $request->input('product_name');
        $product->product_quantity = $request->input('product_quantity');
        $product->product_price = $request->input('product_price');
        if ($request->hasFile('product_image')) {
            $imagePath = $request->file('product_image')->store('product_images', 'public');
            $product->product_image = $imagePath;
        }
        $product->product_description = $request->input('product_description');
        $product->product_status = $request->input('product_status');
        $product->product_type = $request->input('product_type');
        $product->save();

        return redirect()->route('products.edit', $product->id)->with('success', 'Product updated successfully');
    }

    public function deleteProduct($id){

        $product = Product::findOrFail($id);
        $product->delete();
        return back()->with('status', 'Product deleted successfully!');
    }

    public function search(Request $request)
    {
        // Get the search query from the request
        $query = $request->input('query');

        // Perform a search query using the Product model
        $products = Product::where('product_name', 'like', '%' . $query . '%')->paginate(12);

        // Return the view with the search results
        return view('products', compact('products'))->with('title', 'Search');
    }
}
