@extends('admin.layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
</div>

<!-- Statistics Cards -->
<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="card text-white bg-primary">
            <div class="card-body">
                <h5 class="card-title">Total Orders</h5>
                <p class="card-text h2">{{ $totalOrders }}</p>
                <p class="card-text">
                    <small>{{ $orderIncrease }}% increase from last month</small>
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-success">
            <div class="card-body">
                <h5 class="card-title">Revenue</h5>
                <p class="card-text h2">${{ number_format($totalRevenue, 2) }}</p>
                <p class="card-text">
                    <small>{{ $revenueIncrease }}% increase from last month</small>
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-warning">
            <div class="card-body">
                <h5 class="card-title">Customers</h5>
                <p class="card-text h2">{{ $totalCustomers }}</p>
                <p class="card-text"><small>{{ $newCustomers }} new this month</small></p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-info">
            <div class="card-body">
                <h5 class="card-title">Products</h5>
                <p class="card-text h2">{{ $totalProducts }}</p>
                <p class="card-text"><small>{{ $newProducts }} added this month</small></p>
            </div>
        </div>
    </div>
</div>

<!-- Recent Orders -->
<h2>Recent Orders</h2>
<div class="table-responsive mb-4">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Customer</th>
                <th>Products</th>
                <th>Total</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($recentOrders as $order)
            <tr>
                <td>#{{ $order->order_number }}</td>
                <td>{{ optional($order->user)->name ?? 'N/A' }}</td>
                <td>{{ $order->items_summary }}</td>
                <td>${{ number_format($order->total ?? 0, 2) }}</td>
                <td><span class="badge bg-{{ $order->status_color }}">{{ $order->status }}</span></td>
                <td>
                    <a href="{{ route('admin.orders.show', $order) }}" class="btn btn-sm btn-outline-primary">View</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">No recent orders found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Low Stock Products -->
<h2>Low Stock Products</h2>
<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Product</th>
                <th>Category</th>
                <th>Current Stock</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($lowStockProducts as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ optional($product->category)->name ?? 'Uncategorized' }}</td>
                <td><span class="text-{{ $product->stock_quantity <= 5 ? 'danger' : 'warning' }}">{{ $product->stock_quantity }} units</span></td>
                <td>${{ number_format($product->price, 2) }}</td>
                <td>
                    <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-sm btn-outline-primary">
                        Restock
                    </a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">No low stock products found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection