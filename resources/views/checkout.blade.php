@extends('layouts.app')
@section('title', 'Checkout - GreenGrow Compost')

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
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <h4 class="mb-4">Checkout</h4>
                        <p>Checkout functionality coming soon...</p>
                        <a href="{{ route('cart') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Return to Cart
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection