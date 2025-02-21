@extends('clients.layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-4">Tambah Kategori</h2>

    <form action="{{ route('categories.store') }}" method="POST" class="bg-white p-6 rounded shadow-md">
        @csrf

        <label class="block font-medium">URL Gambar:</label>
        <input type="text" name="image" class="w-full p-2 border rounded mb-3" placeholder="Masukkan URL gambar" required>

        <label class="block font-medium">Nama Kategori:</label>
        <input type="text" name="category_name" class="w-full p-2 border rounded mb-3" placeholder="Masukkan nama kategori" required>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Simpan Kategori
        </button>
    </form>
</div>
@endsection
