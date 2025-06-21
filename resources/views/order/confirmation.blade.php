@extends('layouts.app')
@section('title', 'Order Confirmation - GreenGrow Compost')

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
                    Order Confirmation
                </li>
            </ol>
        </nav>
    </div>
</header>

<!-- Order Confirmation Section -->
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-5 text-center">
                        <div class="mb-4">
                            <i class="fas fa-check-circle text-success fa-4x"></i>
                        </div>
                        <h2 class="mb-4">Thank You for Your Order!</h2>
                        <p class="lead mb-4">Your order #{{ $order }} has been placed successfully.</p>

                        @if(session('success'))
                        <div class="alert alert-success mb-4">
                            {{ session('success') }}
                        </div>
                        @endif

                        <p class="mb-4">
                            We'll send a confirmation email with order details and tracking information once your order ships.
                        </p>

                        <div class="d-grid gap-3 col-md-6 mx-auto">
                            <a href="{{ route('home') }}" class="btn btn-success">
                                <i class="fas fa-home me-2"></i>Return to Home
                            </a>
                            <a href="{{ route('order.details', $order) }}" class="btn btn-outline-success">
                                <i class="fas fa-box me-2"></i>View Order Details
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection