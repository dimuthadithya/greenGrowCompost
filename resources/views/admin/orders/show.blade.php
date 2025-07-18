@extends('admin.layouts.admin')

@section('title', 'Order Details')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Order #{{ $order->order_number }}</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="{{ route('admin.orders.index') }}" class="btn btn-sm btn-outline-secondary">
            <i class="fas fa-arrow-left me-1"></i> Back to Orders
        </a>
    </div>
</div>


<div class="row">
    <div class="col-md-8">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title mb-0">Order Items</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th class="text-end">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->items as $item)
                            <tr>
                                <td>{{ optional($item->product)->name ?? 'Product Removed' }}</td>
                                <td>LKR {{ number_format($item->price ?? 0, 2) }}</td>
                                <td>{{ $item->quantity ?? 0 }}</td>
                                <td class="text-end">LKR {{ number_format(($item->price ?? 0) * ($item->quantity ?? 0), 2) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" class="text-end"><strong>Subtotal:</strong></td>
                                <td class="text-end">LKR {{ number_format($order->subtotal, 2) }}</td>
                            </tr>
                            <tr>
                                <td colspan="3" class="text-end"><strong>Shipping:</strong></td>
                                <td class="text-end">LKR {{ number_format($order->shipping, 2) }}</td>
                            </tr>
                            <tr>
                                <td colspan="3" class="text-end"><strong>Tax:</strong></td>
                                <td class="text-end">LKR {{ number_format($order->tax, 2) }}</td>
                            </tr>
                            <tr>
                                <td colspan="3" class="text-end"><strong>Total:</strong></td>
                                <td class="text-end"><strong>LKR {{ number_format($order->total, 2) }}</strong></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Order Notes</h5>
            </div>
            <div class="card-body">
                {{ $order->notes ?? 'No notes available.' }}
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title mb-0">Order Status</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.orders.update', $order) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <select name="status" class="form-select mb-2">
                            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                            <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                            <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                            <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                        <button type="submit" class="btn btn-primary w-100">Update Status</button>
                    </div>
                </form>
                <div class="alert alert-info mb-0">
                    <small>Current Status: <strong class="text-{{ $order->status_color }}">{{ ucfirst($order->status) }}</strong></small>
                </div>
                <div class="mt-3">
                    <strong>Order Date:</strong><br>
                    {{ $order->created_at->format('M d, Y H:i:s') }}
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title mb-0">Customer Information</h5>
            </div>
            <div class="card-body">
                @if($order->user)
                <p class="mb-1"><strong>Name:</strong> {{ $order->user->name }}</p>
                <p class="mb-1"><strong>Email:</strong> {{ $order->user->email }}</p>
                <p class="mb-0">
                    <a href="{{ route('admin.customers.show', $order->user_id) }}" class="btn btn-sm btn-outline-primary mt-2">
                        View Customer Profile
                    </a>
                </p>
                @else
                <p class="text-muted mb-0">Customer information not available</p>
                @endif
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title mb-0">Shipping Address</h5>
            </div>
            <div class="card-body">
                <address class="mb-0">
                    {{ $order->shipping_address['street'] ?? '' }}<br>
                    {{ $order->shipping_address['city'] ?? '' }}, {{ $order->shipping_address['state'] ?? '' }} {{ $order->shipping_address['zip'] ?? '' }}<br>
                    {{ $order->shipping_address['country'] ?? '' }}
                </address>
            </div>
        </div>

        @if($order->shipping_address !== $order->billing_address)
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Billing Address</h5>
            </div>
            <div class="card-body">
                <address class="mb-0">
                    {{ $order->billing_address['street'] ?? '' }}<br>
                    {{ $order->billing_address['city'] ?? '' }}, {{ $order->billing_address['state'] ?? '' }} {{ $order->billing_address['zip'] ?? '' }}<br>
                    {{ $order->billing_address['country'] ?? '' }}
                </address>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection