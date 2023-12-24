<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function index()
    {
        // Complete it
        return view("dashboard.orders.index", []);
    }

    public function show(Order $order)
    {
        // Complete it
        return view("dashboard.orders.show", [
            'order' => $order,
        ]);
    }

    public function update(Request $request, Order $order)
    {
        // Complete it
    }

    public function destroy(Order $order)
    {
        // Complete it
    }
}
