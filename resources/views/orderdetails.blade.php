@extends('layouts.app')

@section('title', 'Order Details - GreenGrow Compost')

@section('content')
<!-- Page Header -->
<header class="py-5 bg-light mt-5">
    <div class="container py-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}" class="text-decoration-none">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('profile.edit') }}" class="text-decoration-none">Profile</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Order #{{ $order->order_number }}
                </li>
            </ol>
        </nav>
    </div>
</header>

<!-- Order Details Section -->
<section class="order-details-section py-5">
    <div class="container">
        @if(session('success'))
        <div class="alert alert-success mb-4">
            {{ session('success') }}
        </div>
        @endif

        <!-- Order Summary Card -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Order Summary</h5>
                    <span class="badge bg-{{ $order->status_color }}">{{ ucfirst($order->status) }}</span>
                </div>
            </div>
            <div class="card-body p-4">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="text-muted mb-2">Order Information</h6>
                        <p class="mb-1"><strong>Order Number:</strong> {{ $order->order_number }}</p>
                        <p class="mb-1"><strong>Order Date:</strong> {{ $order->created_at->format('F j, Y') }}</p>
                        <p class="mb-1"><strong>Order Status:</strong> {{ ucfirst($order->status) }}</p>
                        <p class="mb-0"><strong>Payment Status:</strong> Paid</p>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-muted mb-2">Shipping Address</h6>
                        <p class="mb-1">{{ $order->address->first_name }} {{ $order->address->last_name }}</p>
                        <p class="mb-1">{{ $order->address->address }}</p>
                        <p class="mb-1">{{ $order->address->city }}, {{ $order->address->state }} {{ $order->address->postal_code }}</p>
                        <p class="mb-1">{{ $order->address->country }}</p>
                        <p class="mb-0">Phone: {{ $order->address->phone }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Order Items Card -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0">Order Items</h5>
            </div>
            <div class="card-body p-4">
                <!-- Order Items Table -->
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-end">Price</th>
                                <th class="text-end">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->items as $item)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        @if($item->product && $item->product->image)
                                        <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->name }}" class="me-3" style="width: 50px; height: 50px; object-fit: cover;">
                                        @endif
                                        <div>
                                            <h6 class="mb-0">{{ $item->product ? $item->product->name : 'Product Removed' }}</h6>
                                            @if($item->product)
                                            <small class="text-muted">{{ Str::limit($item->product->description, 50) }}</small>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">{{ $item->quantity }}</td>
                                <td class="text-end">LKR {{ number_format($item->price, 2) }}</td>
                                <td class="text-end">LKR {{ number_format($item->subtotal, 2) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" class="text-end"><strong>Subtotal</strong></td>
                                <td class="text-end">LKR {{ number_format($order->subtotal, 2) }}</td>
                            </tr>
                            <tr>
                                <td colspan="3" class="text-end"><strong>Shipping</strong></td>
                                <td class="text-end">LKR {{ number_format($order->shipping, 2) }}</td>
                            </tr>
                            <tr>
                                <td colspan="3" class="text-end"><strong>Tax</strong></td>
                                <td class="text-end">LKR {{ number_format($order->tax, 2) }}</td>
                            </tr>
                            <tr>
                                <td colspan="3" class="text-end"><strong>Total</strong></td>
                                <td class="text-end"><strong>LKR {{ number_format($order->total, 2) }}</strong></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

        <!-- Product Reviews Card -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0">Product Reviews</h5>
            </div>
            <div class="card-body p-4">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Rating</th>
                                <th>Review</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->items as $item)
                            @php
                            $review = $item->product ? $item->product->reviews()->where('user_id', Auth::id())->first() : null;
                            @endphp
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        @if($item->product && $item->product->image)
                                        <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->name }}" class="me-3" style="width: 50px; height: 50px; object-fit: cover;">
                                        @endif
                                        <div>
                                            <h6 class="mb-0">{{ $item->product ? $item->product->name : 'Product Removed' }}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    @if($review)
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="fas fa-star{{ $i <= $review->rating ? ' text-warning' : ' text-muted' }}"></i>
                                        @endfor
                                        @else
                                        <span class="text-muted">No rating yet</span>
                                        @endif
                                </td>
                                <td>
                                    @if($review)
                                    {{ $review->comment }}
                                    @else
                                    @if($order->status === 'delivered')
                                    <a href="{{ route('products.show', $item->product->id) }}#review" class="btn btn-sm btn-outline-success">
                                        <i class="fas fa-star me-1"></i>Write a Review
                                    </a>
                                    @else
                                    <span class="text-muted">Can review after delivery</span>
                                    @endif
                                    @endif
                                </td>
                                <td>
                                    @if($review)
                                    {{ $review->created_at->format('M d, Y') }}
                                    @else
                                    <span class="text-muted">-</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Actions -->
        <div class="text-center">
            @if($order->status === 'delivered')
            <a href="{{ route('reviews.create', $order->id) }}" class="btn btn-success">
                <i class="fas fa-star me-2"></i>Write a Review
            </a>
            @endif
            <a href="{{ route('profile.edit') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i>Back to Profile
            </a>
        </div>
    </div>
</section>
@endsection