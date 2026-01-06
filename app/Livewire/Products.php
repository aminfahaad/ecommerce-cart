<?php

namespace App\Livewire;

use App\Models\Product;
use DB;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Products extends Component
{
    public function addToCart(int $productId): void
    {
        $product = Product::findOrFail($productId);

        Auth::user()
            ->cartItems()
            ->updateOrCreate(
                ['product_id' => $product->id],
                ['quantity' => DB::raw('quantity + 1')]
            );
    }

    public function render()
    {
        return view('livewire.products', ['products' => Product::all()]);
    }
}
