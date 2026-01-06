<?php

namespace App\Livewire;

use Livewire\Component;

class Cart extends Component
{
    public function updateQuantity(int $itemId, int $quantity)
    {
        $item = auth()->user()->cartItems()->findOrFail($itemId);
        $item->update(['quantity' => $quantity]);
    }

    public function removeItem(int $itemId)
    {
        auth()->user()->cartItems()->findOrFail($itemId)->delete();
    }

    public function render()
    {
        return view('livewire.cart', [
            'items' => auth()->user()
                ->cartItems()
                ->with('product')
                ->get(),
        ]);
    }
}
