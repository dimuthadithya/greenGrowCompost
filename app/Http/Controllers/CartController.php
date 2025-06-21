<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return view('cart');
    }

    public function add(Request $request, Product $product)
    {
        $quantity = $request->input('quantity', 1);

        // Initialize the cart in session if it doesn't exist
        if (!session()->has('cart')) {
            session(['cart' => []]);
        }

        $cart = session('cart');

        // If product already in cart, update quantity
        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $quantity;
        } else {
            // Add new product to cart
            $cart[$product->id] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $quantity,
                'image' => $product->image
            ];
        }

        session(['cart' => $cart]);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function remove(Product $product)
    {
        $cart = session('cart', []);

        if (isset($cart[$product->id])) {
            unset($cart[$product->id]);
            session(['cart' => $cart]);
        }

        return redirect()->back()->with('success', 'Product removed from cart!');
    }

    public function update(Request $request, Product $product)
    {
        $cart = session('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] = $request->quantity;
            session(['cart' => $cart]);
        }

        return redirect()->back()->with('success', 'Cart updated successfully!');
    }
}
