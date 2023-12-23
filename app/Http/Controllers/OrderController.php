<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;

class OrderController extends Controller
{
    public function store(Request $request)
    {

        $order = Order::create([
            'user_id' => $request->user()->id,
            'total_price' => $request->total_price,
        ]);

        foreach (json_decode($request->items) as $item) {
            OrderItem::create(
                [
                    'order_id' => $order->id,
                    'product_id' => $item->product->id,
                    'size_id' => $item->size->id,
                    'quantity' => $item->quantity,
                    'price' => ($item->product->price * $item->quantity),
                ]
            );
        }

        $cart = Cart::where('user_id', $request->user()->id)->first();
        $cart->delete();

        session()->flash('success', 'Order placed successfully!');

        return redirect('/');
    }
}
