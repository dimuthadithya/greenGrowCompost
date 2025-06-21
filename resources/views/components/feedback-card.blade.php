<div class="card h-100 border-0 shadow-sm">
    <div class="card-body p-4">
        <div class="d-flex align-items-center mb-4">
            <img src="{{ $avatar }}" alt="{{ $name }}" class="rounded-circle me-3" style="width: 60px; height: 60px; object-fit: cover;">
            <div>
                <h4 class="h5 mb-1">{{ $name }}</h4>
                @if($date)
                <p class="text-muted small mb-0">{{ $date }}</p>
                @endif
            </div>
        </div>
        <div class="mb-3">
            <div class="text-warning">
                @for($i = 0; $i < $rating; $i++)
                    <i class="fas fa-star"></i>
                    @endfor
                    @for($i = $rating; $i < 5; $i++)
                        <i class="far fa-star"></i>
                        @endfor
            </div>
        </div>
        <p class="text-muted mb-0">{{ $content }}</p>
    </div>
</div>