<div class="grid grid-cols-3 gap-4">
    @foreach ($products as $product)
        <div class="border p-4 rounded">
            <h3 class="font-bold">{{ $product->name }}</h3>
            <p>${{ number_format($product->price, 2) }}</p>
            <p>Stock: {{ $product->stock_quantity }}</p>

            <button wire:click="addToCart({{ $product->id }})" class="mt-2 bg-blue-500 text-white px-3 py-1 rounded">
                Add to Cart
            </button>
        </div>
    @endforeach
</div>
