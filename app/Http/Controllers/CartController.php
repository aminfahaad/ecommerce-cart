<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddToCartRequest;
use App\Http\Resources\CartItemResource;
use App\Jobs\CheckLowStockJob;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index(Request $request)
    {
        return CartItemResource::collection(
            $request->user()->cartItems()->with('product')->get()
        );
    }

    public function store(AddToCartRequest $request)
    {
        $user = $request->user();
        $product = Product::findOrFail($request->product_id);


        abort_if($product->stock_quantity < $request->quantity, 422);


        $item = CartItem::updateOrCreate(
            ['user_id' => $user->id, 'product_id' => $product->id],
            ['quantity' => DB::raw('quantity + ' . $request->quantity)]
        );


        CheckLowStockJob::dispatch($product);


        return new CartItemResource($item->load('product'));
    }

    public function destroy(CartItem $cartItem)
    {
        abort_if($cartItem->user_id !== auth()->id(), 403);
        $cartItem->delete();

        return response()->noContent();
    }
}
