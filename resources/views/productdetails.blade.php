@extends('layouts.app')
@section('title', 'GreenGrow Compost - Organic Fertilizer')

@section('content')
<!-- Product Details Section -->
<section class="py-5 mt-5">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html" class="text-decoration-none">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="index.html#products" class="text-decoration-none">Products</a>
                </li>
                <li class="breadcrumb-item active">Veggie Pro Compost</li>
            </ol>
        </nav>

        <div class="row g-4">
            <!-- Product Image -->
            <div class="col-md-6">
                <div class="product-image mb-3">
                    <span class="best-seller-badge">
                        <i class="fas fa-award me-1"></i>Best Seller
                    </span>
                    <img
                        src="https://images.unsplash.com/photo-1605000797499-95a51c5269ae?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1471&q=80"
                        alt="Veggie Pro Compost"
                        class="img-fluid rounded-3" />
                </div>
            </div>

            <!-- Product Info -->
            <div class="col-md-6">
                <h1 class="display-5 mb-3">Veggie Pro Compost</h1>
                <div class="stock-badge mb-3">
                    <i class="fas fa-check me-1"></i>In Stock
                </div>

                <div class="price-section mb-4">
                    <h2 class="text-success mb-3">Rs. 1,200/Bag</h2>
                    <p class="mb-2">Available in:</p>
                    <div class="btn-group mb-3" role="group">
                        <input
                            type="radio"
                            class="btn-check"
                            name="size"
                            id="size25"
                            autocomplete="off"
                            checked />
                        <label class="btn btn-outline-success" for="size25">25kg Bag</label>

                        <input
                            type="radio"
                            class="btn-check"
                            name="size"
                            id="size50"
                            autocomplete="off" />
                        <label class="btn btn-outline-success" for="size50">50kg Bag</label>
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-success btn-lg">
                            <i class="fas fa-shopping-cart me-2"></i>Add to Cart
                        </button>
                        <button class="btn btn-outline-success">
                            <i class="fas fa-phone me-2"></i>Contact for Bulk Orders
                        </button>
                    </div>
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
                        A professional grade loam-based soil enriched with organic
                        compost. The perfect choice for the discerning gardener building
                        vegetable patches and raised beds.
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