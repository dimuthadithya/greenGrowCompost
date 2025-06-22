@extends('admin.layouts.admin')

@section('title', 'Manage Reviews')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Product Reviews</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Reviews</li>
    </ol>


    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-comments me-1"></i>
            All Reviews
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="reviewsTable">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Customer</th>
                            <th>Rating</th>
                            <th>Review</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($reviews as $review)
                        <tr>
                            <td>{{ $review->product->name }}</td>
                            <td>{{ $review->user->name }}</td>
                            <td>
                                <div class="star-rating">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <=$review->rating)
                                        <i class="fas fa-star text-warning"></i>
                                        @elseif ($i - 0.5 <= $review->rating)
                                            <i class="fas fa-star-half-alt text-warning"></i>
                                            @else
                                            <i class="far fa-star text-warning"></i>
                                            @endif
                                            @endfor
                                </div>
                            </td>
                            <td>{{ $review->comment }}</td>
                            <td>
                                <span class="badge bg-{{ $review->is_approved ? 'success' : 'warning' }}">
                                    {{ $review->is_approved ? 'Approved' : 'Pending' }}
                                </span>
                            </td>
                            <td>{{ $review->created_at->format('M d, Y') }}</td>
                            <td>
                                <div class="d-flex gap-1">
                                    <form action="{{ route('admin.reviews.toggle', $review) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-sm p-1 btn-{{ $review->is_approved ? 'warning' : 'success' }}" title="{{ $review->is_approved ? 'Disapprove' : 'Approve' }} this review">
                                            <i class="fas fa-{{ $review->is_approved ? 'times' : 'check' }}"></i>
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.reviews.destroy', $review) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm p-1 btn-danger" onclick="return confirm('Are you sure you want to delete this review?')" title="Delete this review">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">No reviews found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        $('#reviewsTable').DataTable({
            order: [
                [5, 'desc']
            ], // Sort by date column by default
            pageLength: 10,
            dom: '<"d-flex justify-content-between align-items-center mb-3"lf>rt<"d-flex justify-content-between align-items-center mt-3"ip>',
            language: {
                search: "Search reviews:",
                lengthMenu: "Show _MENU_ reviews per page",
            }
        });
    });
</script>
@endpush
@endsection