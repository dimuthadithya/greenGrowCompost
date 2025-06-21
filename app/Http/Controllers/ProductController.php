<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')
            ->where('is_active', true)
            ->latest()
            ->paginate(12);

        return view('products.index', compact('products'));
    }

    public function home()
    {
        $featuredProducts = Product::with('category')
            ->where('is_active', true)
            ->latest()
            ->take(8)
            ->get();

        return view('welcome', compact('featuredProducts'));
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }
}
