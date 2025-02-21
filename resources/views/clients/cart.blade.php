@extends('clients.layouts.app')

@section('title', 'Shopping Cart')

@section('content')
    <h2 class="text-2xl font-bold mb-4">🛒 Shopping Cart</h2>

    @if(session('success'))
        <div class="bg-green-200 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-200 text-red-700 p-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    @if($cartItems->isEmpty())
        <p class="text-gray-700">
            Keranjang Anda kosong. <a href="{{ route('dashboard') }}" class="text-blue-500">Belanja sekarang!</a>
        </p>
    @else
        <table class="w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="p-3">Produk</th>
                    <th class="p-3">Jumlah</th>
                    <th class="p-3">Harga</th>
                    <th class="p-3">Total</th>
                    <th class="p-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $totalPrice = 0; @endphp
                @foreach($cartItems as $item)
                @php
                    $itemTotal = $item->qty * $item->product->price;
                    $totalPrice += $itemTotal;
                @endphp
                <tr class="border-b">
                    <td class="p-3">{{ $item->product->name }}</td>
                    <td class="p-3">
                        <form action="{{ route('cart.update', $item->id) }}" method="POST" class="flex items-center">
                            @csrf
                            @method('PUT')
                            <input type="number" name="qty" value="{{ $item->qty }}" min="1" class="border p-2 w-16">
                            <button type="submit" class="bg-blue-500 text-white px-3 py-1 ml-2 rounded hover:bg-blue-600">🔄</button>
                        </form>
                    </td>
                    <td class="p-3">Rp {{ number_format($item->product->price, 0, ',', '.') }}</td>
                    <td class="p-3">Rp {{ number_format($itemTotal, 0, ',', '.') }}</td>
                    <td class="p-3">
                        <form action="{{ route('cart.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">❌</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4 p-3 bg-gray-100 rounded shadow">
            <p class="text-xl font-bold">Total Harga: Rp {{ number_format($totalPrice, 0, ',', '.') }}</p>
            <a href="{{ route('dashboard') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 mt-2 inline-block">
                🛍 Checkout
            </a>
        </div>
    @endif
@endsection
