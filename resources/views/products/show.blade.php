@extends('layouts.app')

@section('content')
<div class="container py-5">
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('products.index') }}" class="text-decoration-none">Products</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
        </ol>
    </nav>

    <div class="row">
        <!-- Product Image -->
        <div class="col-md-6 mb-4">
            <div class="card border-0 shadow-sm">
                @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="card-img-top">
                @else
                <div class="bg-light p-5 d-flex align-items-center justify-content-center">
                    <span class="text-muted">No image available</span>
                </div>
                @endif
            </div>
        </div>

        <!-- Product Details -->
        <div class="col-md-6">
            <h1 class="h2 mb-4">{{ $product->name }}</h1>

            @if($product->category)
            <div class="mb-3">
                <span class="badge bg-success">{{ $product->category->name }}</span>
            </div>
            @endif

            <div class="mb-4">
                <h2 class="h4 text-success">${{ number_format($product->price, 2) }}</h2>
            </div>

            <div class="mb-4">
                <p class="text-muted">{{ $product->description }}</p>
            </div>

            <!-- Add to Cart Form -->
            <form action="{{ route('cart.add', $product) }}" method="POST" class="mb-4">
                @csrf
                <div class="row g-3">
                    <div class="col-auto">
                        <div class="input-group">
                            <label class="input-group-text" for="quantity">Quantity</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" value="1" min="1" max="99">
                        </div>
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-success w-100">
                            <i class="fas fa-cart-plus me-2"></i>Add to Cart
                        </button>
                    </div>
                </div>
            </form>

            <!-- Additional Product Information -->
            @if($product->specifications)
            <div class="mt-4">
                <h3 class="h5 mb-3">Product Specifications</h3>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tbody>
                            @foreach($product->specifications as $key => $value)
                            <tr>
                                <th class="w-25">{{ $key }}</th>
                                <td>{{ $value }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endif
        </div>
    </div>

    <!-- Product Reviews -->
    @if($product->reviews->count() > 0)
    <div class="mt-5">
        <h3 class="h4 mb-4">Customer Reviews</h3>
        @foreach($product->reviews as $review)
        <div class="card mb-3">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-2">
                    <div>
                        <h6 class="mb-0">{{ $review->user->name }}</h6>
                        <small class="text-muted">{{ $review->created_at->format('M d, Y') }}</small>
                    </div>
                    <div>
                        @for($i = 1; $i <= 5; $i++)
                            <i class="fas fa-star {{ $i <= $review->rating ? 'text-warning' : 'text-muted' }}"></i>
                            @endfor
                    </div>
                </div>
                <p class="mb-0">{{ $review->comment }}</p>
            </div>
        </div>
        @endforeach
    </div>
    @endif

    <!-- Related Products -->
    @if($product->category && $product->category->products->where('id', '!=', $product->id)->count() > 0)
    <div class="mt-5">
        <h3 class="h4 mb-4">Related Products</h3>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
            @foreach($product->category->products->where('id', '!=', $product->id)->take(4) as $relatedProduct)
            <div class="col">
                <x-product-card
                    :title="$relatedProduct->name"
                    :price="number_format($relatedProduct->price, 2)"
                    :image="$relatedProduct->image ?? 'images/default-product.jpg'"
                    :description="$relatedProduct->description"
                    :product-id="$relatedProduct->id" />
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div>
@endsection