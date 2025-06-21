@props([
'title',
'price',
'image',
'description',
'productId',
'badge' => null
])

<div class="bg-white rounded-lg shadow-md overflow-hidden h-100">
    @if($badge)
    <div class="absolute top-4 left-4">
        <span class="bg-green-600 text-white px-3 py-1 rounded-full text-sm font-semibold">
            {{ $badge }}
        </span>
    </div>
    @endif

    <div class="aspect-w-4 aspect-h-3">
        @if($image)
        <img src="{{ asset($image) }}" alt="{{ $title }}" class="w-100 object-cover">
        @endif
    </div>

    <div class="p-4">
        <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $title }}</h3>
        <p class="text-gray-600 mb-4">{{ $description }}</p>

        <div class="flex justify-between items-center">
            <div class="text-green-600 font-bold text-xl">
                Rs. {{ $price }}
            </div>

            <form action="{{ route('cart.add', $productId) }}" method="POST">
                @csrf
                <input type="hidden" name="quantity" value="1">
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700 transition-colors">
                    Add to Cart
                </button>
            </form>
        </div>
    </div>
</div>