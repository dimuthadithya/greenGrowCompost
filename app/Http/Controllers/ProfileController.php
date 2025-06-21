<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ProductReview;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(): View
    {
        $user = Auth::user();

        // Get recent orders for the user
        $recentOrders = Order::where('user_id', $user->id)
            ->with(['items.product'])
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        // Get statistics
        $totalOrders = Order::where('user_id', $user->id)->count();
        $totalProducts = OrderItem::whereIn('order_id', function ($query) use ($user) {
            $query->select('id')->from('orders')->where('user_id', $user->id);
        })->sum('quantity');
        $totalReviews = ProductReview::where('user_id', $user->id)->count();

        return view('profile', [
            'user' => $user,
            'recentOrders' => $recentOrders,
            'stats' => [
                'totalOrders' => $totalOrders,
                'totalProducts' => $totalProducts,
                'totalReviews' => $totalReviews,
            ]
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = Auth::user();
        $user->fill($request->validated());

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return back()->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = Auth::user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
