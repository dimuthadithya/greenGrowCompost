<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductReview;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = ProductReview::with(['product', 'user'])
            ->latest()
            ->get();

        return view('admin.reviews.index', compact('reviews'));
    }

    public function toggleApproval(ProductReview $review)
    {
        $review->update([
            'is_approved' => !$review->is_approved
        ]);

        return back()->with('success', 'Review status updated successfully');
    }

    public function destroy(ProductReview $review)
    {
        $review->delete();
        return back()->with('success', 'Review deleted successfully');
    }
}
