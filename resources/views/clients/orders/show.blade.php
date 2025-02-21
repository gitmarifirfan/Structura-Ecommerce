@extends('clients.layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold">Detail Order</h2>
    <p><strong>User:</strong> {{ $order->user->name }}</p>
    <p><strong>Total Amount:</strong> Rp {{ number_format($order->total_amount, 0, ',', '.') }}</p>
    <p><strong>Status:</strong> {{ ucfirst($order->orders_status) }}</p>
    <p><strong>Payment Status:</strong> {{ $order->paymentStatus->name }}</p>
    <a href="{{ route('orders.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Kembali</a>
</div>
@endsection
