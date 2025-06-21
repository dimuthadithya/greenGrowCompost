@extends('admin.layouts.admin')

@section('title', 'Customer Details')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Customer: {{ $customer->name }}</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="{{ route('admin.customers.index') }}" class="btn btn-sm btn-outline-secondary">
            <i class="fas fa-arrow-left me-1"></i> Back to Customers
        </a>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title mb-0">Customer Information</h5>
            </div>
            <div class="card-body">
                <p class="mb-1"><strong>Name:</strong> {{ $customer->name }}</p>
                <p class="mb-1"><strong>Email:</strong> {{ $customer->email }}</p>
                <p class="mb-1"><strong>Joined:</strong> {{ $customer->created_at->format('M d, Y') }}</p>
                <p class="mb-0"><strong>Total Orders:</strong> {{ $customer->orders->count() }}</p>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Customer Statistics</h5>
            </div>
            <div class="card-body">
                <p class="mb-1"><strong>Total Spent:</strong> ${{ number_format($customer->orders->sum('total'), 2) }}</p>
                <p class="mb-1"><strong>Average Order Value:</strong> ${{ number_format($customer->orders->avg('total'), 2) }}</p>
                <p class="mb-0"><strong>Product Reviews:</strong> {{ $customer->reviews->count() }}</p>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title mb-0">Order History</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($customer->orders as $order)
                            <tr>
                                <td>#{{ $order->order_number }}</td>
                                <td>{{ $order->created_at->format('M d, Y') }}</td>
                                <td>
                                    <span class="badge bg-{{ $order->status_color }}">
                                        {{ $order->status }}
                                    </span>
                                </td>
                                <td>${{ number_format($order->total, 2) }}</td>
                                <td>
                                    <a href="{{ route('admin.orders.show', $order) }}" class="btn btn-sm btn-outline-primary">
                                        View
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center">No orders found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Product Reviews</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Rating</th>
                                <th>Comment</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($customer->reviews as $review)
                            <tr>
                                <td>{{ $review->product->name }}</td>
                                <td>
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="fas fa-star{{ $i <= $review->rating ? ' text-warning' : ' text-muted' }}"></i>
                                        @endfor
                                </td>
                                <td>{{ Str::limit($review->comment, 100) }}</td>
                                <td>{{ $review->created_at->format('M d, Y') }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center">No reviews found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection