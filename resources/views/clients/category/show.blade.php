@extends('clients.layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-4">Detail Kategori</h2>

    <div class="bg-white p-6 rounded shadow-md">
        <img src="{{ $category->image }}" alt="{{ $category->category_name }}" class="w-32 h-32 object-cover rounded mb-4">

        <p class="text-lg font-semibold">Nama Kategori: {{ $category->category_name }}</p>

        <a href="{{ route('categories.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 inline-block mt-4">
            🔙 Kembali
        </a>
    </div>
</div>
@endsection
