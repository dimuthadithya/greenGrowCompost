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

        return view('products', compact('products'));
    }
    public function home()
    {
        // Featured products are specifically curated products
        $featuredProducts = Product::with('category')
            ->where('is_active', true)
            ->where('is_featured', true)
            ->take(3)
            ->get();

        // Get the latest 3 approved reviews with product and user information
        $latestReviews = \App\Models\ProductReview::with(['product', 'user'])
            ->where('is_approved', true)
            ->latest()
            ->take(3)
            ->get();

        return view('welcome', compact('featuredProducts', 'latestReviews'));
    }
    public function show(Product $product)
    {
        return view('productdetails', compact('product'));
    }

    private function truncateDescription($description, $length = 100)
    {
        if (strlen($description) <= $length) {
            return $description;
        }
        return substr($description, 0, $length) . '...';
    }
}
