<?php

namespace App\Http\Controllers;

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

    public function index()
    {
        $cart = $this->createCart();
        $cartItems = CartItem::with('cart', 'product', 'size')->where("cart_id", $cart->id)->get();

        $totalPrice = 0;
        if (count($cartItems) !== 0) {
            $totalPrice = $cartItems->sum(function ($item) {
                return $item->product->price * $item->quantity;
            });
        }

        $shippingPrice = 5;

        return view("cart.index", [
            'items' => $cartItems,
            'shippingPrice' => $shippingPrice,
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

        return redirect()->route('products.index')->with("success", "Product added to cart!");
    }

    public function update(Request $request, CartItem $cartitem)
    {
        $action = $request->action;

        if (empty($cartitem)) {
            return redirect()->route('cart.index')->with("success", "Product can't be updated!");
        }

        if ($action === "sub" && $cartitem->quantity === 1) {
            $cartitem->delete();
        } else {
            if ($action === "sub") {
                $cartitem->quantity -= 1;
            } else {
                $cartitem->quantity += 1;
            }

            $cartitem->save();
        }

        return redirect()->route('cart.index')->with("success", "Product successfully updated from cart!");
    }

    public function destroy(CartItem $cartitem)
    {
        if (empty($cartitem)) {
            return redirect()->route('cart.index')->with("success", "Product can't be removed!");
        }

        $cartitem->delete();

        return redirect()->route('cart.index')->with("success", "Product successfully removed from cart!");
    }
}