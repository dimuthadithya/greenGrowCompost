@extends('layouts.app')
@section('title', $product->name . ' - GreenGrow Compost')

@section('content')
<!-- Product Details Section -->
<section class="py-5 mt-5">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}" class="text-decoration-none">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('products.index') }}" class="text-decoration-none">Products</a>
                </li>
                <li class="breadcrumb-item active">{{ $product->name }}</li>
            </ol>
        </nav>

        <div class="row g-4">
            <!-- Product Image -->
            <div class="col-md-6">
                <div class="product-image mb-3">
                    @if($product->is_featured)
                    <span class="best-seller-badge">
                        <i class="fas fa-award me-1"></i>Best Seller
                    </span>
                    @endif
                    <img
                        src="{{ asset('storage/')."/".$product->image ?? '' }}"
                        alt="{{ $product->name }}"
                        class="img-fluid rounded-3" />
                </div>
            </div>

            <!-- Product Info -->
            <div class="col-md-6">
                <h1 class="display-5 mb-3">{{ $product->name }}</h1>
                <div class="stock-badge mb-3">
                    @if($product->stock_quantity > 0)
                    <i class="fas fa-check me-1"></i>
                    <span class="text-success">In Stock ({{ $product->stock_quantity }} bags available)</span>
                    @else
                    <i class="fas fa-times me-1"></i>
                    <span class="text-danger">Out of Stock</span>
                    @endif
                </div>

                <div class="price-section mb-4">
                    <h2 class="text-success mb-3">Rs. {{ number_format($product->price) }}/{{ $product->weight }}{{ $product->unit }}</h2>

                    @auth
                    <form action="{{ route('cart.add', $product->id) }}" method="POST" class="mb-4">
                        @csrf
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity:</label>
                            <div class="input-group" style="width: 200px;">
                                <button type="button" class="btn btn-outline-secondary" onclick="decrementQuantity()">-</button>
                                <input type="number" class="form-control text-center" id="quantity" name="quantity" value="1" min="1" max="{{ $product->stock_quantity }}" required>
                                <button type="button" class="btn btn-outline-secondary" onclick="incrementQuantity()">+</button>
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-success btn-lg" {{ $product->stock_quantity < 1 ? 'disabled' : '' }}>
                                <i class="fas fa-shopping-cart me-2"></i>Add to Cart
                            </button>
                            <a href="{{ route('contact') }}" class="btn btn-outline-success">
                                <i class="fas fa-phone me-2"></i>Contact for Bulk Orders
                            </a>
                        </div>
                    </form>
                    @else
                    <div class="alert alert-info mb-4" role="alert">
                        <h5 class="alert-heading"><i class="fas fa-info-circle me-2"></i>Login Required</h5>
                        <p class="mb-0">Please <a href="{{ route('login') }}" class="alert-link">login</a> or <a href="{{ route('register') }}" class="alert-link">register</a> to add products to your cart.</p>
                    </div>
                    <div class="d-grid gap-2">
                        <a href="{{ route('login') }}" class="btn btn-success btn-lg">
                            <i class="fas fa-sign-in-alt me-2"></i>Login to Purchase
                        </a>
                        <a href="{{ route('contact') }}" class="btn btn-outline-success">
                            <i class="fas fa-phone me-2"></i>Contact for Bulk Orders
                        </a>
                    </div>
                    @endauth
                </div>

                <div class="product-features mb-4">
                    <h4 class="mb-3">Key Features:</h4>
                    <div class="d-flex flex-wrap gap-2">
                        <span class="feature-badge">
                            <i class="fas fa-seedling"></i>
                            <span>Organic</span>
                        </span>
                        <span class="feature-badge">
                            <i class="fas fa-leaf"></i>
                            <span>Peat Free</span>
                        </span>
                        <span class="feature-badge">
                            <i class="fas fa-recycle"></i>
                            <span>Sustainable</span>
                        </span>
                        <span class="feature-badge">
                            <i class="fas fa-check-circle"></i>
                            <span>Professional Grade</span>
                        </span>
                    </div>
                </div>

                <div class="product-description">
                    <h4 class="text-success">Product Description</h4>
                    <p class="lead">
                        {{ $product->description }}
                    </p>

                    <h5 class="text-success mt-4">Benefits include:</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <i class="fas fa-check text-success me-2"></i>
                            Ideal for filling vegetable patches or raised beds
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-check text-success me-2"></i>
                            Contains high organic matter content with naturally
                            slow-releasing nutrients
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-check text-success me-2"></i>
                            Well-structured to allow air circulation, drainage and root
                            development
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-check text-success me-2"></i>
                            Rich in natural fibres as this blended with our compost
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-check text-success me-2"></i>
                            Will continue to improve over time
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection