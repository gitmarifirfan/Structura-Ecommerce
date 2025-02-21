@extends('clients.layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold">Daftar Orders</h2>

    <a href="{{ route('orders.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Tambah Order</a>

    <table class="w-full mt-4 border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-100">
                <th class="border px-4 py-2">ID</th>
                <th class="border px-4 py-2">User</th>
                <th class="border px-4 py-2">Total</th>
                <th class="border px-4 py-2">Status</th>
                <th class="border px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td class="border px-4 py-2">{{ $order->id }}</td>
                <td class="border px-4 py-2">{{ $order->user->name }}</td>
                <td class="border px-4 py-2">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</td>
                <td class="border px-4 py-2">{{ ucfirst($order->orders_status) }}</td>
                <td class="border px-4 py-2">
                    <a href="{{ route('orders.show', $order->id) }}" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">Lihat</a>
                    <a href="{{ route('orders.edit', $order->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Edit</a>
                    <form action="{{ route('orders.destroy', $order->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
