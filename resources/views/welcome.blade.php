@extends('layouts.app')

@section('title', 'GreenGrow Compost - Organic Fertilizer')

@section('content')
<!-- Hero Section -->
<section class="hero-section py-5 text-white position-relative">
    <div class="container mt-5 text-center">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h1 class="display-3 fw-bold mb-4">Premium Organic Compost</h1>
                <p class="lead fs-3 mb-5">Natural. Sustainable. Powerful. Transform your garden with our 100% organic compost fertilizer.</p>
                <div class="d-flex flex-column flex-sm-row justify-content-center gap-3">
                    <a href="{{ route('products.index') }}" class="btn btn-success btn-lg px-4">
                        <i class="fas fa-shopping-cart me-2"></i>Shop Now
                    </a>
                    <a href="#contact" class="btn btn-outline-light btn-lg px-4">
                        <i class="fas fa-envelope me-2"></i>Contact Us
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-5 bg-light">
    <div class="container py-5">
        <h2 class="display-5 text-success text-center mb-5">Why Choose Our Compost?</h2>
        <div class="row g-4">
            <!-- Feature 1 -->
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="text-success mb-4">
                            <i class="fas fa-recycle fa-3x"></i>
                        </div>
                        <h3 class="h4 mb-3 text-success">Organic & Chemical-Free</h3>
                        <p class="text-muted">100% natural compost made from biodegradable waste with no harmful chemicals.</p>
                    </div>
                </div>
            </div>

            <!-- Feature 2 -->
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="text-success mb-4">
                            <i class="fas fa-seedling fa-3x"></i>
                        </div>
                        <h3 class="h4 mb-3 text-success">Enriches Soil</h3>
                        <p class="text-muted">Improves soil structure and provides essential nutrients for healthy plant growth.</p>
                    </div>
                </div>
            </div>

            <!-- Feature 3 -->
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="text-success mb-4">
                            <i class="fas fa-globe-asia fa-3x"></i>
                        </div>
                        <h3 class="h4 mb-3 text-success">Eco-Friendly</h3>
                        <p class="text-muted">Sustainable solution that reduces waste and helps protect our environment.</p>
                    </div>
                </div>
            </div>

            <!-- Feature 4 -->
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="text-success mb-4">
                            <i class="fas fa-chart-line fa-3x"></i>
                        </div>
                        <h3 class="h4 mb-3 text-success">Boosts Yield</h3>
                        <p class="text-muted">Increases crop productivity and improves the quality of your harvest.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="py-5">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <img src="https://via.placeholder.com/600x400?text=About+Us" class="img-fluid rounded shadow" alt="About GreenGrow">
            </div>
            <div class="col-lg-6">
                <h2 class="display-5 text-success mb-4">About GreenGrow</h2>
                <p class="lead mb-4">At GreenGrow, we're passionate about sustainable agriculture and helping you grow healthier, more productive plants naturally.</p>
                <p class="text-muted mb-4">Founded in 2020, GreenGrow has been at the forefront of organic composting technology. We transform organic waste into premium quality compost, contributing to a more sustainable future while helping gardens thrive.</p>
                <div class="row g-4 mb-4">
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center">
                            <div class="text-success me-3">
                                <i class="fas fa-check-circle fa-2x"></i>
                            </div>
                            <div>
                                <h4 class="h5 mb-1">100% Organic</h4>
                                <p class="text-muted mb-0">No artificial additives</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center">
                            <div class="text-success me-3">
                                <i class="fas fa-award fa-2x"></i>
                            </div>
                            <div>
                                <h4 class="h5 mb-1">Certified Quality</h4>
                                <p class="text-muted mb-0">ISO 9001 certified</p>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="{{ route('products.index') }}" class="btn btn-success btn-lg">
                    <i class="fas fa-leaf me-2"></i>Explore Our Products
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Featured Products Section -->
<section class="py-5">
    <div class="container py-5">
        <h2 class="display-5 text-success text-center mb-5">Featured Products</h2>
        <div class="row g-4">
            @forelse($featuredProducts as $product)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm product-card">
                    <img src="{{ asset('storage/' . $product->image) ?? 'https://via.placeholder.com/400x300?text=' . urlencode($product->name) }}"
                        class="card-img-top"
                        alt="{{ $product->name }}">
                    <div class="card-body p-4">
                        <h3 class="h5 mb-3">{{ $product->name }}</h3>
                        <p class="text-muted mb-3">{{ Str::limit($product->description, 100) }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="h5 mb-0">${{ number_format($product->price, 2) }}</span>
                            <a href="{{ route('products.show', $product) }}" class="btn btn-outline-success">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <p class="text-muted">No featured products available at the moment.</p>
            </div>
            @endforelse
        </div>
        <div class="text-center mt-5">
            <a href="{{ route('products.index') }}" class="btn btn-success btn-lg">View All Products</a>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="py-5 bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="display-5 text-success mb-4">Get in Touch</h2>
                <p class="lead text-muted mb-5">Have questions about our products? We're here to help!</p>
                <div class="row g-4 justify-content-center">
                    <div class="col-md-4">
                        <div class="text-success mb-3">
                            <i class="fas fa-phone fa-2x"></i>
                        </div>
                        <h3 class="h5 mb-2">Call Us</h3>
                        <p class="text-muted">+1 (555) 123-4567</p>
                    </div>
                    <div class="col-md-4">
                        <div class="text-success mb-3">
                            <i class="fas fa-envelope fa-2x"></i>
                        </div>
                        <h3 class="h5 mb-2">Email Us</h3>
                        <p class="text-muted">info@greengrow.com</p>
                    </div>
                    <div class="col-md-4">
                        <div class="text-success mb-3">
                            <i class="fas fa-location-dot fa-2x"></i>
                        </div>
                        <h3 class="h5 mb-2">Visit Us</h3>
                        <p class="text-muted">123 Green Street<br>Eco City, EC 12345</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection