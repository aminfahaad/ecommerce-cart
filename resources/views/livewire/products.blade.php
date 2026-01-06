@foreach ($products as $product)
    <div class="border p-4">
        <h3>{{ $product->name }}</h3>
        <p>${{ $product->price }}</p>
        <button wire:click="$dispatch('add-to-cart', {{ $product->id }})">Add</button>
    </div>
@endforeach
