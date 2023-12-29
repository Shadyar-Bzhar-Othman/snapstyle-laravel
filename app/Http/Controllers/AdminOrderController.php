<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\State;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function index()
    {
        $state = request()->input("state");

        return view("dashboard.orders.index", [
            'orders' => Order::with(["user", "state"])->filter($state)->latest()->paginate(10)->withQueryString(),
            'states' => State::latest()->get(),
        ]);
    }

    public function show(Order $order)
    {
        $orderItemForOrder = OrderItem::with(["product", "size"])->where("order_id", $order->id)->latest()->get();
        $states = State::latest()->get();

        return view("dashboard.orders.show", [
            'order' => $order,
            'orderitems' => $orderItemForOrder,
            'states' => $states,
        ]);
    }

    public function update(Request $request, Order $order)
    {
        $order->update([
            'state_id' => $request->state,
        ]);

        return redirect()->route('dashboard.orders.index')->with('success', 'Order updated successfully!');
    }
}
