<div>
    @foreach ($items as $item)
        <div class="flex gap-4 items-center border-b py-2">
            <div class="w-1/3">{{ $item->product->name }}</div>

            <input type="number" min="1" value="{{ $item->quantity }}"
                wire:change="updateQuantity({{ $item->id }}, $event.target.value)" class="w-20 border" />

            <div>${{ $item->product->price * $item->quantity }}</div>

            <button wire:click="removeItem({{ $item->id }})" class="text-red-500">
                Remove
            </button>
        </div>
    @endforeach
</div>
