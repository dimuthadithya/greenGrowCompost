<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\ProductReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductReviewController extends Controller
{
    public function create($orderId)
    {
        $order = Order::with('items.product')->findOrFail($orderId);

        // Check if the order belongs to the authenticated user
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        // Check if the order is delivered
        if ($order->status !== 'delivered') {
            return redirect()->back()->with('error', 'You can only review products from delivered orders.');
        }

        return view('reviews.create', compact('order'));
    }

    public function store(Request $request, $orderId)
    {
        $request->validate([
            'reviews' => 'required|array',
            'reviews.*.product_id' => 'required|exists:products,id',
            'reviews.*.rating' => 'required|integer|min:1|max:5',
            'reviews.*.comment' => 'nullable|string|max:1000',
        ]);

        $order = Order::findOrFail($orderId);

        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        foreach ($request->reviews as $review) {
            ProductReview::create([
                'product_id' => $review['product_id'],
                'user_id' => Auth::id(),
                'rating' => $review['rating'],
                'comment' => $review['comment'] ?? null,
                'is_verified_purchase' => true,
                'is_approved' => false,
            ]);
        }

        return redirect()->back()->with('success', 'Thank you for your reviews!');
    }
}
