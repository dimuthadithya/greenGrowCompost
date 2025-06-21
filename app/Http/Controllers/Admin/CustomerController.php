<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the customers.
     */
    public function index()
    {
        $customers = User::where('role', 'customer')
            ->withCount('orders')
            ->latest()
            ->paginate(10);

        return view('admin.customers.index', compact('customers'));
    }

    /**
     * Show the specified customer.
     */
    public function show(User $customer)
    {
        $customer->load(['orders.items.product', 'reviews.product']);
        return view('admin.customers.show', compact('customer'));
    }
}
