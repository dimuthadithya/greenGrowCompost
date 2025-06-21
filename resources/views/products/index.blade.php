<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-8">Our Products</h1>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6"> @foreach($products as $product)
                <x-product-card
                    :title="$product->name"
                    :price="number_format($product->price, 2)"
                    :image="$product->image ?? 'images/default-product.jpg'"
                    :description="$product->description"
                    :product-id="$product->id" />
                @endforeach
            </div>

            <div class="mt-8">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</x-app-layout>