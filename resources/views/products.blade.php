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
            @forelse ($products as $product)
            <div class="col-md-6 col-lg-4">
                <div class="card product-card h-100 border-0 shadow-sm">
                    <div class="position-relative">
                        <img
                            src="{{ asset("storage/")."/".$product->image ?? '' }}"
                            alt="{{ $product->name }}"
                            class="card-img-top"
                            style="height: 250px; object-fit: cover;" />
                        @if($product->is_featured)
                        <span class="product-badge">Best Seller</span>
                        @endif
                    </div>
                    <div class="card-body p-4">
                        <h3 class="h4 text-success">{{ $product->name }}</h3>
                        <p class="text-muted">
                            {{ \Illuminate\Support\Str::limit($product->description, 100) }}
                        </p>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <span class="h4 mb-0 text-success">Rs. {{ number_format($product->price) }}</span>
                            <a href="{{ route('products.show', $product) }}" class="btn btn-success">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="alert alert-info text-center">
                    No products found.
                </div>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-5">
            {{ $products->links() }}
        </div>
    </div>
</section>
@endsection