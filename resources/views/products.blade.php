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
        <!-- Search and Filters -->
        <div class="row mb-5">
            <div class="col-md-12 mb-4">
                <form action="{{ route('products.index') }}" method="GET" class="search-form">
                    <div class="input-group">
                        <input type="text"
                            class="form-control"
                            placeholder="Search products..."
                            name="search"
                            value="{{ request('search') }}">
                        <button class="btn btn-success" type="submit">
                            <i class="fas fa-search"></i> Search
                        </button>
                    </div>
                </form>
            </div>

            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Filters</h5>
                        <form action="{{ route('products.index') }}" method="GET" id="filterForm">
                            <!-- Preserve search term if exists -->
                            @if(request('search'))
                            <input type="hidden" name="search" value="{{ request('search') }}">
                            @endif

                            <!-- Categories -->
                            <div class="mb-4">
                                <label class="form-label">Categories</label>
                                <select class="form-select" name="category" onchange="this.form.submit()">
                                    <option value="">All Categories</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Price Range -->
                            <div class="mb-4">
                                <label class="form-label">Price Range</label>
                                <div class="d-flex gap-2">
                                    <input type="number"
                                        class="form-control"
                                        placeholder="Min"
                                        name="min_price"
                                        value="{{ request('min_price') }}">
                                    <input type="number"
                                        class="form-control"
                                        placeholder="Max"
                                        name="max_price"
                                        value="{{ request('max_price') }}">
                                </div>
                            </div>

                            <!-- Sort -->
                            <div class="mb-4">
                                <label class="form-label">Sort By</label>
                                <select class="form-select" name="sort" onchange="this.form.submit()">
                                    <option value="created_at" {{ request('sort') == 'created_at' ? 'selected' : '' }}>Latest</option>
                                    <option value="price" {{ request('sort') == 'price' ? 'selected' : '' }}>Price</option>
                                    <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Name</option>
                                </select>
                            </div>

                            <!-- Sort Direction -->
                            <div class="mb-4">
                                <select class="form-select" name="direction" onchange="this.form.submit()">
                                    <option value="asc" {{ request('direction') == 'asc' ? 'selected' : '' }}>Ascending</option>
                                    <option value="desc" {{ request('direction') == 'desc' ? 'selected' : '' }}>Descending</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-success w-100">Apply Filters</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                @if($products->isEmpty())
                <div class="alert alert-info">
                    <i class="fas fa-info-circle me-2"></i>
                    @if(request('search'))
                    No products found matching "{{ request('search') }}"
                    @else
                    No products available at the moment.
                    @endif
                </div>
                @else
                <div class="row g-4">
                    @foreach($products as $product)
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 border-0 shadow-sm product-card">
                            <img src="{{ $product->image_url ?? 'https://via.placeholder.com/400x300?text=' . urlencode($product->name) }}"
                                class="card-img-top"
                                alt="{{ $product->name }}">
                            <div class="card-body p-4">
                                <h3 class="h5 mb-2">{{ $product->name }}</h3>
                                <p class="text-muted small mb-2">{{ $product->category->name }}</p>
                                <p class="text-muted mb-3">{{ Str::limit($product->description, 100) }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="h5 mb-0">${{ number_format($product->price, 2) }}</span>
                                    <a href="{{ route('products.show', $product) }}" class="btn btn-outline-success">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-center mt-5">
                    {{ $products->links() }}
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    .product-card {
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
    }

    .search-form {
        max-width: 600px;
        margin: 0 auto;
    }
</style>
@endpush