@extends('layouts.app')
@section('title', 'Shopping Cart - GreenGrow Compost')

@push('styles')
<link href="{{ asset('assets/css/cart.css') }}" rel="stylesheet" />
@endpush

@section('content')
<!-- Page Header -->
<header class="py-5 bg-light mt-5">
    <div class="container py-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}" class="text-decoration-none">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Shopping Cart
                </li>
            </ol>
        </nav>
    </div>
</header>

<!-- Cart Section -->
<section class="cart-section py-5">
    <div class="container">
        <div class="row">
            <!-- Cart Items -->
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="mb-0">Shopping Cart</h4>
                            <span class="text-muted">{{ count($cart) }} {{ Str::plural('item', count($cart)) }}</span>
                        </div>

                        @forelse($cart as $id => $item)
                        <!-- Cart Item -->
                        <div class="row mb-4 align-items-center cart-item">
                            <div class="col-md-2 col-4">
                                <img
                                    src="{{ $item['image'] ? asset('storage/' . $item['image']) : asset('images/no-image.jpg') }}"
                                    alt="{{ $item['name'] }}"
                                    class="img-fluid rounded product-image" />
                            </div>
                            <div class="col-md-5 col-8">
                                <h5 class="mb-2">{{ $item['name'] }}</h5>
                                <p class="text-muted mb-0">${{ number_format($item['price'], 2) }} each</p>
                            </div>
                            <div class="col-md-2 col-6">
                                <form action="{{ route('cart.update', $id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PATCH')
                                    <div class="quantity-control d-flex align-items-center justify-content-center">
                                        <button
                                            type="button"
                                            class="btn btn-sm btn-outline-secondary px-2 me-2"
                                            onclick="updateQuantity(this, -1)">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <input
                                            type="number"
                                            name="quantity"
                                            class="form-control form-control-sm text-center quantity-input"
                                            value="{{ $item['quantity'] }}"
                                            min="1" />
                                        <button
                                            type="button"
                                            class="btn btn-sm btn-outline-secondary px-2 ms-2"
                                            onclick="updateQuantity(this, 1)">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-2 col-4">
                                <span class="fw-bold">${{ number_format($item['price'] * $item['quantity'], 2) }}</span>
                            </div>
                            <div class="col-md-1 col-2 text-end">
                                <form action="{{ route('cart.remove', $id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link text-danger p-0">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        @empty
                        <div class="text-center py-4">
                            <h5>Your cart is empty</h5>
                            <a href="{{ route('products.index') }}" class="btn btn-primary mt-3">Continue Shopping</a>
                        </div>
                        @endforelse

                        <!-- Cart Actions -->
                        @if(count($cart) > 0)
                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left me-2"></i>Continue Shopping
                            </a>
                            <form action="{{ route('cart.clear') }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger">
                                    <i class="fas fa-trash me-2"></i>Clear Cart
                                </button>
                            </form>
                        </div>
                        @endif
                    </div>

                </div>

            </div>
        </div>
    </div> <!-- Order Summary -->
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <h4 class="mb-4">Order Summary</h4>
                <div class="d-flex justify-content-between mb-3">
                    <span>Subtotal</span>
                    <span class="fw-bold">${{ number_format($total, 2) }}</span>
                </div>
                @php
                $shipping = count($cart) > 0 ? 5.00 : 0;
                $tax = $total * 0.10;
                $grandTotal = $total + $shipping + $tax;
                @endphp
                <div class="d-flex justify-content-between mb-3">
                    <span>Shipping</span>
                    <span class="fw-bold">${{ number_format($shipping, 2) }}</span>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <span>Tax (10%)</span>
                    <span class="fw-bold">${{ number_format($tax, 2) }}</span>
                </div>
                <hr />
                <div class="d-flex justify-content-between mb-4">
                    <span class="fw-bold">Total</span>
                    <span class="fw-bold text-success h4 mb-0">${{ number_format($grandTotal, 2) }}</span>
                </div>

                <!-- Promo Code -->
                <div class="mb-4">
                    <label class="form-label">Promo Code</label>
                    <div class="input-group">
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Enter code" />
                        <button class="btn btn-success" type="button">Apply</button>
                    </div>
                </div>

                <!-- Checkout Button -->
                @if(count($cart) > 0)
                <a href="{{ route('checkout') }}" class="btn btn-success w-100 mb-3">
                    <i class="fas fa-lock me-2"></i>Proceed to Checkout
                </a>
                @endif
                </button>

                <!-- Payment Methods -->
                <div class="text-center mt-3">
                    <small class="text-muted">We Accept:</small>
                    <div class="mt-2">
                        <i class="fab fa-cc-visa fa-2x me-2 text-muted"></i>
                        <i class="fab fa-cc-mastercard fa-2x me-2 text-muted"></i>
                        <i class="fab fa-cc-amex fa-2x me-2 text-muted"></i>
                        <i class="fab fa-cc-paypal fa-2x text-muted"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    function updateQuantity(button, change) {
        const input = button.parentElement.querySelector('input[name="quantity"]');
        const currentValue = parseInt(input.value);
        const newValue = currentValue + change;

        if (newValue >= 1) {
            input.value = newValue;
            button.closest('form').submit();
        }
    }
</script>
@endsection