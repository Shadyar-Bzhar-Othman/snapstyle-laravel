<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class PageController extends Controller
{
    public function home()
    {
        $products = Product::limit(4)->latest()->get();

        return view("website.index", [
            'products' => $products,
        ]);
    }

    public function dashboard()
    {
        $products = Product::limit(8)->latest()->get();
        $product = count(Product::all());
        $user = count(User::all());
        $order = count(Order::all());
        $orderpending = count(Order::where("state_id", 1)->get());
        $orderaccepted = count(Order::where("state_id", 2)->get());
        $orderfinished = count(Order::where("state_id", 3)->get());

        return view("dashboard.index", [
            "products" => $products,
            "product" => $product,
            "user" => $user,
            "order" => $order,
            "orderpending" => $orderpending,
            "orderaccepted" => $orderaccepted,
            "orderfinished" => $orderfinished,
        ]);
    }
}
