<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function store(Request $request)
    {
        $user = $request->user();
        $cartItems = $user->cartItems()->with('product')->get();

        abort_if($cartItems->isEmpty(), 422, 'Cart is empty');

        DB::transaction(function () use ($cartItems, $user) {
            $total = $cartItems->sum(
                fn($item) =>
                $item->quantity * $item->product->price
            );

            $order = Order::create([
                'user_id' => $user->id,
                'total' => $total,
            ]);

            foreach ($cartItems as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product->id,
                    'quantity' => $item->quantity,
                    'price' => $item->product->price,
                ]);

                $item->product->decrement('stock_quantity', $item->quantity);
            }

            $user->cartItems()->delete();
        });

        return response()->json(['message' => 'Checkout successful']);
    }
}
