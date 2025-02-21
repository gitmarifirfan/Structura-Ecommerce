@extends('clients.layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-4">Daftar Kategori</h2>

    @if(session('success'))
        <div class="bg-green-200 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('categories.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 mb-4 inline-block">
        ➕ Tambah Kategori
    </a>

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-200">
                <tr>
                    <th class="p-3">Gambar</th>
                    <th class="p-3">Nama Kategori</th>
                    <th class="p-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr class="border-b">
                    <td class="p-3">
                        <img src="{{ $category->image }}" alt="{{ $category->category_name }}" class="w-16 h-16 object-cover rounded">
                    </td>
                    <td class="p-3">{{ $category->category_name }}</td>
                    <td class="p-3">
                        <a href="{{ route('categories.show', $category->id) }}" class="text-blue-500">🔍 Lihat</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
