@extends('layouts.app')
@section('title', 'GreenGrow Compost - Organic Fertilizer')

@section('content')

<!-- Page Header -->
<header class="py-5 bg-light mt-5">
    <div class="container py-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html" class="text-decoration-none">Home</a>
                </li>
                <li class="breadcrumb-item active">Products</li>
            </ol>
        </nav>
        <h1 class="display-4 text-success mb-4">Our Products</h1>
        <p class="lead text-muted mb-0">
            Discover our complete range of premium organic compost products.
        </p>
    </div>
</header>

<!-- Products Section -->
<section class="py-5">
    <div class="container">
        <!-- Filters -->
        <div class="row mb-5">
            <div class="col-md-6">
                <div class="d-flex gap-2">
                    <button class="btn btn-success active">All Products</button>
                    <button class="btn btn-outline-success">Organic Compost</button>
                    <button class="btn btn-outline-success">Specialty Mix</button>
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-group">
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Search products..." />
                    <button class="btn btn-success">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Products Grid -->
        <div class="row g-4">
            <!-- Product 1 -->
            <div class="col-md-6 col-lg-4">
                <div class="card product-card h-100 border-0 shadow-sm">
                    <div class="position-relative">
                        <img
                            src="https://images.unsplash.com/photo-1586771107445-d3ca888129ce?ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&amp;auto=format&amp;fit=crop&amp;w=1470&amp;q=80"
                            alt="Premium Garden Compost"
                            class="card-img-top" />
                        <span class="product-badge">Best Seller</span>
                    </div>
                    <div class="card-body p-4">
                        <h3 class="h4 text-success">Premium Garden Compost</h3>
                        <p class="text-muted">
                            Perfect for small gardens and potted plants. Rich in nutrients
                            and organic matter.
                        </p>
                        <div
                            class="d-flex justify-content-between align-items-center mt-3">
                            <span class="h4 mb-0 text-success">Rs. 1,200</span>
                            <a href="product-details.html" class="btn btn-success">View Details</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product 2 -->
            <div class="col-md-6 col-lg-4">
                <div class="card product-card h-100 border-0 shadow-sm">
                    <div class="position-relative">
                        <img
                            src="https://images.unsplash.com/photo-1605000797499-95a51c5269ae?ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&amp;auto=format&amp;fit=crop&amp;w=1471&amp;q=80"
                            alt="Veggie Pro Compost"
                            class="card-img-top" />
                        <span class="product-badge">Popular</span>
                    </div>
                    <div class="card-body p-4">
                        <h3 class="h4 text-success">Veggie Pro Compost</h3>
                        <p class="text-muted">
                            Specially formulated for vegetable gardens. Enhanced with
                            natural nutrients.
                        </p>
                        <div
                            class="d-flex justify-content-between align-items-center mt-3">
                            <span class="h4 mb-0 text-success">Rs. 2,200</span>
                            <a href="product-details.html" class="btn btn-success">View Details</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product 3 -->
            <div class="col-md-6 col-lg-4">
                <div class="card product-card h-100 border-0 shadow-sm">
                    <div class="position-relative">
                        <img
                            src="https://images.unsplash.com/photo-1599427303058-f04cbcf4756f?ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&amp;auto=format&amp;fit=crop&amp;w=1471&amp;q=80"
                            alt="Bulk Garden Compost"
                            class="card-img-top" />
                        <span class="product-badge">Bulk Order</span>
                    </div>
                    <div class="card-body p-4">
                        <h3 class="h4 text-success">Bulk Garden Compost</h3>
                        <p class="text-muted">
                            Ideal for large gardens and commercial projects. Available in
                            bulk quantities.
                        </p>
                        <div
                            class="d-flex justify-content-between align-items-center mt-3">
                            <span class="h4 mb-0 text-success">Rs. 4,000</span>
                            <button class="btn btn-success">Contact Sales</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product 4 -->
            <div class="col-md-6 col-lg-4">
                <div class="card product-card h-100 border-0 shadow-sm">
                    <div class="position-relative">
                        <img
                            src="https://images.unsplash.com/photo-1605001017150-85d6b92eefb6?ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&amp;auto=format&amp;fit=crop&amp;w=1470&amp;q=80"
                            alt="Flower Garden Mix"
                            class="card-img-top" />
                        <span class="product-badge bg-info">New</span>
                    </div>
                    <div class="card-body p-4">
                        <h3 class="h4 text-success">Flower Garden Mix</h3>
                        <p class="text-muted">
                            Special blend for flowering plants. Enhanced with
                            bloom-boosting nutrients.
                        </p>
                        <div
                            class="d-flex justify-content-between align-items-center mt-3">
                            <span class="h4 mb-0 text-success">Rs. 1,500</span>
                            <a href="product-details.html" class="btn btn-success">View Details</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product 5 -->
            <div class="col-md-6 col-lg-4">
                <div class="card product-card h-100 border-0 shadow-sm">
                    <div class="position-relative">
                        <img
                            src="https://images.unsplash.com/photo-1599427303058-f04cbcf4756f?ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&amp;auto=format&amp;fit=crop&amp;w=1471&amp;q=80"
                            alt="Herb Garden Mix"
                            class="card-img-top" />
                    </div>
                    <div class="card-body p-4">
                        <h3 class="h4 text-success">Herb Garden Mix</h3>
                        <p class="text-muted">
                            Perfect blend for herbs and small container gardens. Rich in
                            minerals.
                        </p>
                        <div
                            class="d-flex justify-content-between align-items-center mt-3">
                            <span class="h4 mb-0 text-success">Rs. 1,800</span>
                            <a href="product-details.html" class="btn btn-success">View Details</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product 6 -->
            <div class="col-md-6 col-lg-4">
                <div class="card product-card h-100 border-0 shadow-sm">
                    <div class="position-relative">
                        <img
                            src="https://images.unsplash.com/photo-1605000797499-95a51c5269ae?ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&amp;auto=format&amp;fit=crop&amp;w=1471&amp;q=80"
                            alt="Premium Potting Mix"
                            class="card-img-top" />
                        <span class="product-badge bg-warning text-dark">Limited</span>
                    </div>
                    <div class="card-body p-4">
                        <h3 class="h4 text-success">Premium Potting Mix</h3>
                        <p class="text-muted">
                            Professional grade potting mix for indoor and outdoor
                            container plants.
                        </p>
                        <div
                            class="d-flex justify-content-between align-items-center mt-3">
                            <span class="h4 mb-0 text-success">Rs. 1,600</span>
                            <a href="product-details.html" class="btn btn-success">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <nav class="mt-5" aria-label="Product navigation">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                </li>
                <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</section>
@endsection