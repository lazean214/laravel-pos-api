<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    // Display a listing of order items
    public function index()
    {
        return OrderItem::with('order', 'medicine')->get();
    }

    // Store a newly created order item in storage
    public function store(Request $request)
    {
        $validated = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'medicine_id' => 'required|exists:medicines,id',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        $orderItem = OrderItem::create($validated);

        return response()->json($orderItem, 201);
    }

    // Display the specified order item
    public function show(OrderItem $orderItem)
    {
        return response()->json($orderItem->load('order', 'medicine'));
    }

    // Update the specified order item in storage
    public function update(Request $request, OrderItem $orderItem)
    {
        $validated = $request->validate([
            'quantity' => 'integer',
            'price' => 'numeric',
        ]);

        $orderItem->update($validated);

        return response()->json($orderItem);
    }

    // Remove the specified order item from storage
    public function destroy(OrderItem $orderItem)
    {
        $orderItem->delete();

        return response()->json(['message' => 'Order Item deleted successfully']);
    }
}
