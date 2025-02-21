<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\PaymentStatus;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // ✅ Tampilkan Semua Order
    public function index()
    {
        $orders = Order::with('user', 'paymentStatus')->latest()->get();
        return view('orders.index', compact('orders'));
    }

    // ✅ Detail Order berdasarkan ID
    public function show($id)
    {
        $order = Order::with('user', 'paymentStatus')->findOrFail($id);
        return view('orders.show', compact('order'));
    }

    // ✅ Form Tambah Order
    public function create()
    {
        $users = User::all();
        $paymentStatuses = PaymentStatus::all();
        return view('orders.create', compact('users', 'paymentStatuses'));
    }

    // ✅ Simpan Order Baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'payment_status_id' => 'required|exists:payment_statuses,id',
            'total_amount' => 'required|numeric|min:0',
            'orders_status' => 'required|in:pending,processing,shipped,delivered,canceled'
        ]);

        Order::create($validatedData);
        return redirect()->route('orders.index')->with('success', 'Order berhasil dibuat!');
    }

    // ✅ Form Edit Order
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $users = User::all();
        $paymentStatuses = PaymentStatus::all();
        return view('orders.edit', compact('order', 'users', 'paymentStatuses'));
    }

    // ✅ Update Order
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $validatedData = $request->validate([
            'payment_status_id' => 'sometimes|exists:payment_statuses,id',
            'total_amount' => 'sometimes|numeric|min:0',
            'orders_status' => 'sometimes|in:pending,processing,shipped,delivered,canceled'
        ]);

        $order->update($validatedData);
        return redirect()->route('orders.index')->with('success', 'Order berhasil diperbarui!');
    }

    // ✅ Hapus Order
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Order berhasil dihapus!');
    }
}
