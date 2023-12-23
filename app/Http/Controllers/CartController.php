<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CartController extends Controller
{

    public function createCart()
    {
        $cart = Cart::where("user_id", auth()->user()->id)->first();

        if (empty($cart)) {
            $cart = Cart::create([
                'user_id' => auth()->user()->id,
            ]);
        }

        return $cart;
    }
    public function create()
    {
        $cart = $this->createCart();
        $cartItems = CartItem::with('cart', 'product', 'size')->where("cart_id", $cart->id)->get();

        $totalPrice = 0;
        if (count($cartItems) !== 0) {
            $totalPrice = $cartItems->sum(function ($item) {
                return $item->product->price * $item->quantity;
            });
        }

        return view("cart.create", [
            'items' => $cartItems,
            'totalPrice' => $totalPrice,
        ]);
    }

    public function store(Request $request)
    {
        $sizeFieldName = "size_" . $request->product_id;

        $this->validate($request, [
            'product_id' => ["required"],
            $sizeFieldName => ["required", Rule::exists("sizes", "id")],
            'quantity' => ["required"],
        ]);

        $cart = $this->createCart();

        $cartItem = CartItem::where('cart_id', $cart->id)
            ->where('product_id', $request->product_id)
            ->where('size_id', $request->$sizeFieldName)
            ->first();

        if (empty($cartItem)) {
            CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $request->product_id,
                'size_id' => $request->$sizeFieldName,
                'quantity' => $request->quantity,
            ]);
        } else {
            $cartItem->quantity += $request->quantity;
            $cartItem->save();
        }

        session()->flash('success', 'Product added to cart!');

        return redirect('/');
    }

    public function update(Request $request)
    {
        $cart_id = $request->cart_id;
        $product_id = $request->product_id;
        $size_id = $request->size_id;
        $action = $request->action;

        $cartItem = CartItem::where('cart_id', $cart_id)
            ->where('product_id', $product_id)
            ->where('size_id', $size_id)
            ->first();

        if (empty($cartItem)) {
            return redirect('/cart');
        }

        if ($action === "sub" && $cartItem->quantity === 1) {
            $cartItem->delete();
        } else {
            if ($action === "sub") {
                $cartItem->quantity -= 1;
            } else {
                $cartItem->quantity += 1;
            }

            $cartItem->save();
        }

        session()->flash('success', 'Product successfully updated from cart!');

        return redirect('/cart');
    }

    public function destroy(Request $request)
    {
        $cart_id = $request->cart_id;
        $product_id = $request->product_id;
        $size_id = $request->size_id;

        $cartItem = CartItem::where('cart_id', $cart_id)
            ->where('product_id', $product_id)
            ->where('size_id', $size_id)
            ->first();

        if (empty($cartItem)) {
            return redirect('/cart');
        }

        $cartItem->delete();

        session()->flash('success', 'Product successfully removed from cart!');

        return redirect('/cart');
    }
}
