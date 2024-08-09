<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Carts;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function viewCart()
    {
        $cartItems = Carts::where('user_id', Auth::id())->with('product')->get();
        foreach ($cartItems as $item) {
            $item->total_price = $item->quantity * $item->product->product_price;
        }
        return view('cart', compact('cartItems'))->with('title', 'View Cart');;
    }
    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $cartItem = Carts::where('user_id', Auth::id())->where('product_id', $id)->first();
        if ($cartItem) {
            $cartItem->quantity += 1;
            $cartItem->save();
        } else {
            Carts::create([
                'user_id' => Auth::id(),
                'product_id' => $id,
                'quantity' => 1,
            ]);
        }

        return response()->json(['status' => 'Product added to cart successfully!']);
    }

    public function updateCart(Request $request, $id)
    {
        $cartItem = Carts::findOrFail($id);
        $product = Product::findOrFail($cartItem->product_id);

        $request->validate([
            'quantity' => 'required|integer|min:1|max:' . $product->product_quantity,
        ], [
            'quantity.max' => 'The quantity cannot exceed the available stock of ' . $product->product_quantity,
        ]);

        $cartItem->quantity = $request->input('quantity');
        $cartItem->save();

        return redirect()->route('cart.view')->with('status', 'Cart updated successfully!');
    }
    public function deleteCart($id)
    {
        $cartItem = Carts::findOrFail($id);
        $cartItem->delete();

        return back()->with('status', 'Item removed from cart successfully!');
    }

    public function buyProduct($id)
    {
        $cartItem = Carts::findOrFail($id);
        $product = Product::findOrFail($cartItem->product_id);

        // Create purchase history entry
        Order::create([
            'user_id' => auth()->id(),
            'product_id' => $cartItem->product_id,
            'product_name' => $cartItem->product->product_name,
            'quantity' => $cartItem->quantity,
            'total_price' => $cartItem->product->product_price * $cartItem->quantity,
        ]);

        // Remove item from cart
        $product->product_quantity -= $cartItem->quantity;
        $product->save();
        $cartItem->delete();

        return back()->with('status', 'Product purchased successfully!');
    }
}
