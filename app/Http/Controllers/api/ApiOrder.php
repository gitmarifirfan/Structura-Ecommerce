<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class ApiOrder extends Controller
{
    // ✅ GET ALL ORDERS
    public function getUserOrder()
    {
        $order = Order::with('user', 'paymentStatus')->get();

        if ($order->isEmpty()) {
            return response()->json([
                'message' => 'No orders found',
                'data' => []
            ], 404);
        }

        return response()->json([
            'message' => 'Get all orders',
            'data' => $order
        ], 200);
    }

    // ✅ GET ORDER BY ID
    public function getOrderById(string $id)
    {
        $order = Order::with('user', 'paymentStatus')->find($id);

        if (!$order) {
            return response()->json([
                'message' => 'order not found'
            ], 404);
        }

        return response()->json([
            'message' => 'Fetching order data',
            'data' => $order
        ], 200);
    }

    // ✅ CREATE ORDER
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'payment_status_id' => 'required|exists:payment_statuses,id',
            'total_amount' => 'required|numeric|min:0',
            'orders_status' => 'required|in:pending,processing,shipped,delivered,canceled'
        ]);

        $order = Order::create($validatedData);

        return response()->json([
            'message' => 'Order created successfully',
            'data' => $order
        ], 201);
    }

    // ✅ UPDATE ORDER
    public function update(Request $request, string $id)
    {
        $order = Order::find($id);

        if (!$order) {
            return response()->json([
                'message' => 'order not found'
            ], 404);
        }

        $validatedData = $request->validate([
            'payment_status_id' => 'sometimes|exists:payment_statuses,id',
            'total_amount' => 'sometimes|numeric|min:0',
            'orders_status' => 'sometimes|in:pending,processing,shipped,delivered,canceled'
        ]);

        $order->update($validatedData);

        return response()->json([
            'message' => 'Order updated successfully',
            'data' => $order
        ], 200);
    }

    // ✅ DELETE ORDER
    public function destroy(string $id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return response()->json([
            'message' => 'Order deleted successfully'
        ], 200);
    }
}
