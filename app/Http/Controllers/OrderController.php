<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Display a listing of orders
    public function index()
    {
        return Order::with('customer', 'orderItems.medicine')->get();
    }

    // Store a newly created order in storage
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
        ]);

        $order = Order::create($validated);

        return response()->json($order, 201);
    }

    // Display the specified order
    public function show(Order $order)
    {
        return response()->json($order->load('customer', 'orderItems.medicine'));
    }

    // Update the specified order in storage
    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'customer_id' => 'exists:customers,id',
        ]);

        $order->update($validated);

        return response()->json($order);
    }

    // Remove the specified order from storage
    public function destroy(Order $order)
    {
        $order->delete();

        return response()->json(['message' => 'Order deleted successfully']);
    }
}
