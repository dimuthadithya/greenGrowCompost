<div class="bg-white rounded-lg shadow-lg overflow-hidden">
    <img src="{{ $image }}" alt="{{ $title }}" class="w-full h-48 object-cover">
    <div class="p-4">
        <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $title }}</h3>
        <p class="text-gray-600 text-sm mb-4">{{ $description }}</p>
        <div class="flex items-center justify-between">
            <span class="text-2xl font-bold text-green-600">${{ $price }}</span>
            <a href="{{ $slug ? route('product.show', $slug) : '#' }}"
                class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 transition duration-300">
                View Details
            </a>
        </div>
    </div>
</div>