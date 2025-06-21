@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h2 class="mb-4">Write Product Reviews</h2>

            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif

            <form action="{{ route('reviews.store', $order->id) }}" method="POST">
                @csrf @foreach($order->items as $itemIndex => $item)
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                @if($item->product->image)
                                <img src="{{ asset('storage/' . $item->product->image) }}" class="img-fluid" alt="{{ $item->product->name }}">
                                @else
                                <div class="bg-secondary text-white p-4 text-center">No Image</div>
                                @endif
                            </div>
                            <div class="col-md-9">
                                <h5 class="card-title">{{ $item->product->name }}</h5>
                                <input type="hidden" name="reviews[{{ $itemIndex }}][product_id]" value="{{ $item->product_id }}">

                                <div class="form-group mb-3">
                                    <label class="form-label">Rating</label>
                                    <div class="rating">
                                        @for($i = 5; $i >= 1; $i--)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="reviews[{{ $itemIndex }}][rating]" value="{{ $i }}" required>
                                            <label class="form-check-label">{{ $i }} star{{ $i != 1 ? 's' : '' }}</label>
                                        </div>
                                        @endfor
                                    </div>
                                </div>

                                <div class="form-group"> <label for="comment{{ $itemIndex }}" class="form-label">Comment (optional)</label>
                                    <textarea
                                        name="reviews[{{ $itemIndex }}][comment]"
                                        id="comment{{ $itemIndex }}"
                                        class="form-control @error('reviews.' . $itemIndex . '.comment') is-invalid @enderror"
                                        rows="3"></textarea>
                                    @error('reviews.' . $itemIndex . '.comment')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg">Submit Reviews</button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .rating {
        display: flex;
        flex-direction: row-reverse;
        justify-content: flex-end;
    }
</style>
@endsection