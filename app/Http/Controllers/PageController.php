<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view("website.index", ['products' => Product::limit(4)->latest()->get()]);
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
            "products" => Product::limit(8)->latest()->get(),
            "product" => count(Product::all()),
            "user" => count(User::all()),
            "order" => count(Order::all()),
            "orderpending" => count(Order::where("state_id", 1)->get()),
            "orderaccepted" => count(Order::where("state_id", 2)->get()),
            "orderfinished" => count(Order::where("state_id", 3)->get()),
        ]);
    }
}
