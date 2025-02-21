@extends('clients.layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold">Tambah Order</h2>

    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        <label class="block">User:</label>
        <select name="user_id" class="w-full p-2 border rounded mb-3">
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>

        <label class="block">Total Amount:</label>
        <input type="number" name="total_amount" class="w-full p-2 border rounded mb-3">

        <label class="block">Status:</label>
        <select name="orders_status" class="w-full p-2 border rounded mb-3">
            <option value="pending">Pending</option>
            <option value="processing">Processing</option>
            <option value="shipped">Shipped</option>
            <option value="delivered">Delivered</option>
            <option value="canceled">Canceled</option>
        </select>

        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Simpan</button>
    </form>
</div>
@endsection
