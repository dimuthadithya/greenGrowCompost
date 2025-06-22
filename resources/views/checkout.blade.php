@extends('layouts.app')
@section('title', 'Checkout - GreenGrow Compost')

@push('styles')
<style>
    .card-input {
        font-family: monospace;
        letter-spacing: 1px;
    }

    .card-input.is-invalid {
        border-color: #dc3545;
        padding-right: calc(1.5em + 0.75rem);
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12' width='12' height='12' fill='none' stroke='%23dc3545'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23dc3545' stroke='none'/%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right calc(0.375em + 0.1875rem) center;
        background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
    }
</style>
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
                <li class="breadcrumb-item">
                    <a href="{{ route('cart') }}" class="text-decoration-none">Shopping Cart</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Checkout
                </li>
            </ol>
        </nav>
    </div>
</header>

<!-- Checkout Section -->
<section class="checkout-section py-5">
    <div class="container">
        @if (session('error'))
        <div class="alert alert-danger mb-4">
            {{ session('error') }}
        </div>
        @endif

        <form id="payment-form" action="{{ route('checkout.process') }}" method="POST">
            @csrf
            <div class="row">
                <!-- Shipping Address -->
                <div class="col-lg-7">
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body p-4">
                            <h4 class="mb-4">Shipping Address</h4>

                            @if($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="first_name" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="last_name" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name" required>
                                </div>
                                <div class="col-12">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email', Auth::user()->email ?? 'bacuvinyz@mailinator.com') }}" required>
                                </div>
                                <div class="col-12">
                                    <label for="address" class="form-label">Street Address</label>
                                    <input type="text" class="form-control" id="address" name="address" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="city" class="form-label">City</label>
                                    <input type="text" class="form-control" id="city" name="city" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="postal_code" class="form-label">Postal Code</label>
                                    <input type="text" class="form-control" id="postal_code" name="postal_code" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="state" class="form-label">State</label>
                                    <input type="text" class="form-control" id="state" name="state" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="country" class="form-label">Country</label>
                                    <select class="form-select" id="country" name="country" required>
                                        <option value="">Choose...</option>
                                        <option value="IN">India</option>
                                        <option value="LK" selected>Sri Lanka</option>
                                        <option value="NP">Nepal</option>
                                        <option value="BD">Bangladesh</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input type="tel" class="form-control" id="phone" name="phone" required>
                                </div>
                            </div>
                        </div>
                    </div> <!-- Payment Details -->
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4">
                            <h4 class="mb-4">Payment Details</h4>
                            <div class="row g-3">
                                <div class="col-12">
                                    <label for="card_number" class="form-label">Card Number</label>
                                    <input type="text"
                                        class="form-control card-input"
                                        id="card_number"
                                        name="card_number"
                                        placeholder="0000 0000 0000 0000"
                                        maxlength="19"
                                        required>
                                    <div class="invalid-feedback">
                                        Please enter a valid 16-digit card number
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="expiry_date" class="form-label">Expiry Date</label>
                                    <input type="text"
                                        class="form-control card-input"
                                        id="expiry_date"
                                        name="expiry_date"
                                        placeholder="MM/YY"
                                        maxlength="5"
                                        required>
                                    <div class="invalid-feedback">
                                        Please enter a valid expiry date (MM/YY)
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="cvv" class="form-label">CVV</label>
                                    <input type="text"
                                        class="form-control card-input"
                                        id="cvv"
                                        name="cvv"
                                        placeholder="000"
                                        maxlength="3"
                                        required>
                                    <div class="invalid-feedback">
                                        Please enter a valid 3-digit CVV
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="card_holder" class="form-label">Card Holder Name</label>
                                    <input type="text"
                                        class="form-control"
                                        id="card_holder"
                                        name="card_holder"
                                        placeholder="Name on card"
                                        required>
                                    <div class="invalid-feedback">
                                        Please enter the card holder's name
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order Summary -->
                <div class="col-lg-5">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4">
                            <h4 class="mb-4">Order Summary</h4>

                            <!-- Cart Items Summary -->
                            @foreach($cart as $item)
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <h6 class="mb-0">{{ $item['name'] }}</h6>
                                    <small class="text-muted">Quantity: {{ $item['quantity'] }}</small>
                                </div>
                                <span>LKR {{ number_format($item['price'] * $item['quantity'], 2) }}</span>
                            </div>
                            @endforeach

                            <hr>

                            <!-- Order Totals -->
                            <div class="d-flex justify-content-between mb-2">
                                <span>Subtotal</span>
                                <span>LKR {{ number_format($total, 2) }}</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Shipping</span>
                                <span>LKR {{ number_format($shipping, 2) }}</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Tax (10%)</span>
                                <span>LKR {{ number_format($tax, 2) }}</span>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between mb-4">
                                <span class="fw-bold">Total</span>
                                <span class="fw-bold text-success h4 mb-0">
                                    LKR {{ number_format($total + $shipping + $tax, 2) }}
                                </span>
                            </div>

                            <!-- Place Order Button -->
                            <button type="submit" class="btn btn-success btn-lg w-100" id="submit-button">
                                <i class="fas fa-lock me-2"></i>Place Order
                            </button>

                            <div class="text-center mt-4">
                                <small class="text-muted">
                                    <i class="fas fa-shield-alt me-1"></i>
                                    Your payment information is encrypted and secure
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('payment-form');
        const submitButton = document.getElementById('submit-button');
        const cardNumber = document.getElementById('card_number');
        const expiryDate = document.getElementById('expiry_date');
        const cvv = document.getElementById('cvv');

        // Format card number with spaces
        cardNumber.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\s/g, '').replace(/[^0-9]/gi, '');
            let formattedValue = '';
            for (let i = 0; i < value.length; i++) {
                if (i > 0 && i % 4 === 0) {
                    formattedValue += ' ';
                }
                formattedValue += value[i];
            }
            e.target.value = formattedValue;

            // Validate card number
            const isValid = value.length === 16;
            e.target.classList.toggle('is-invalid', !isValid);
        });

        // Format expiry date
        expiryDate.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length > 2) {
                value = value.substr(0, 2) + '/' + value.substr(2);
            }
            e.target.value = value;

            // Validate expiry date
            const isValid = /^(0[1-9]|1[0-2])\/([0-9]{2})$/.test(value);
            if (isValid) {
                const [month, year] = value.split('/');
                const now = new Date();
                const currentYear = now.getFullYear() % 100;
                const currentMonth = now.getMonth() + 1;
                const isValidDate = (year > currentYear) ||
                    (year == currentYear && month >= currentMonth);
                e.target.classList.toggle('is-invalid', !isValidDate);
            } else {
                e.target.classList.toggle('is-invalid', true);
            }
        });

        // Format CVV
        cvv.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            e.target.value = value;

            // Validate CVV
            const isValid = value.length === 3;
            e.target.classList.toggle('is-invalid', !isValid);
        });

        // Form submission
        form.addEventListener('submit', function(event) {
            let isValid = true;

            // Validate card number
            const cardValue = cardNumber.value.replace(/\s/g, '');
            if (cardValue.length !== 16) {
                cardNumber.classList.add('is-invalid');
                isValid = false;
            }

            // Validate expiry date
            const expiryValue = expiryDate.value;
            if (!/^(0[1-9]|1[0-2])\/([0-9]{2})$/.test(expiryValue)) {
                expiryDate.classList.add('is-invalid');
                isValid = false;
            }

            // Validate CVV
            if (cvv.value.length !== 3) {
                cvv.classList.add('is-invalid');
                isValid = false;
            }

            if (!isValid) {
                event.preventDefault();
                return;
            }

            // Show loading state
            submitButton.disabled = true;
            submitButton.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Processing...';
        });
    });
</script>
@endpush