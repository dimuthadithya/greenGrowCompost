<div class="card h-100 border-0 shadow-sm product-card">
    <img src="{{ $image }}" class="card-img-top" alt="{{ $title }}">
    <div class="card-body p-4">
        <h3 class="h5 mb-3">{{ $title }}</h3>
        <p class="text-muted mb-3">{{ $description }}</p>
        <div class="d-flex justify-content-between align-items-center">
            <span class="h5 mb-0">${{ $price }}</span>
            <a href="{{ route('products.show', $productId) }}" class="btn btn-outline-success">View Details</a>
        </div>
    </div>
</div>