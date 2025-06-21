<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // Get statistics
        $totalOrders = Order::count();
        $totalRevenue = Order::sum('total_amount');
        $totalCustomers = User::where('role', 'customer')->count();
        $totalProducts = Product::count();

        // Calculate increases
        $lastMonthOrders = Order::whereMonth('created_at', now()->subMonth())->count();
        $orderIncrease = $lastMonthOrders > 0 ? round(($totalOrders - $lastMonthOrders) / $lastMonthOrders * 100) : 0;

        $lastMonthRevenue = Order::whereMonth('created_at', now()->subMonth())->sum('total_amount');
        $revenueIncrease = $lastMonthRevenue > 0 ? round(($totalRevenue - $lastMonthRevenue) / $lastMonthRevenue * 100) : 0;

        $newCustomers = User::where('role', 'customer')
            ->whereMonth('created_at', now())
            ->count();

        $newProducts = Product::whereMonth('created_at', now())
            ->count();

        // Get recent orders
        $recentOrders = Order::with('user')
            ->latest()
            ->take(10)
            ->get();

        return view('admin.dashboard', compact(
            'totalOrders',
            'totalRevenue',
            'totalCustomers',
            'totalProducts',
            'orderIncrease',
            'revenueIncrease',
            'newCustomers',
            'newProducts',
            'recentOrders'
        ));
    }
}
