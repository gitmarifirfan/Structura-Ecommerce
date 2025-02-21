@extends('clients.layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <div class="bg-white shadow p-6 rounded-lg">
        <h2 class="text-2xl font-bold">Informasi Akun</h2>
        <p class="text-gray-600"><strong>Email:</strong> {{ $user->email }}</p>
        <p class="text-gray-600"><strong>Nama:</strong> {{ $user->name }}</p>

        <!-- Cek jika alamat ada -->
        @if($user->address)
            <p class="text-gray-600"><strong>Alamat:</strong></p>
            <ul class="ml-4 text-gray-600">
                <li><strong>Penerima:</strong> {{ $user->address['nama_penerima'] ?? 'Belum diisi' }}</li>
                <li><strong>Telepon:</strong> {{ $user->address['no_telepon'] ?? 'Belum diisi' }}</li>
                <li><strong>Provinsi:</strong> {{ $user->address['provinsi'] ?? 'Belum diisi' }}</li>
                <li><strong>Kota/Kab:</strong> {{ $user->address['kota_kabupaten'] ?? 'Belum diisi' }}</li>
                <li><strong>Kecamatan:</strong> {{ $user->address['kecamatan'] ?? 'Belum diisi' }}</li>
                <li><strong>Kode Pos:</strong> {{ $user->address['kode_pos'] ?? 'Belum diisi' }}</li>
                <li><strong>Alamat Lengkap:</strong> {{ $user->address['alamat_lengkap'] ?? 'Belum diisi' }}</li>
            </ul>
        @else
            <p class="text-gray-600">Alamat belum diisi</p>
        @endif

        <!-- Form Update Profil -->
        <h3 class="text-xl font-semibold mt-6">Update Profil</h3>
        <form action="{{ route('profile.update') }}" method="POST" class="mt-4">
            @csrf
            @method('PUT')

            <label class="block font-medium">Nama:</label>
            <input type="text" name="name" value="{{ $user->name }}" class="w-full p-2 border rounded mb-3">

            <h3 class="text-lg font-semibold mt-4">Alamat</h3>

            <label class="block font-medium">Nama Penerima:</label>
            <input type="text" name="address[nama_penerima]" value="{{ $user->address['nama_penerima'] ?? '' }}" class="w-full p-2 border rounded mb-3">

            <label class="block font-medium">No. Telepon:</label>
            <input type="text" name="address[no_telepon]" value="{{ $user->address['no_telepon'] ?? '' }}" class="w-full p-2 border rounded mb-3">

            <label class="block font-medium">Provinsi:</label>
            <input type="text" name="address[provinsi]" value="{{ $user->address['provinsi'] ?? '' }}" class="w-full p-2 border rounded mb-3">

            <label class="block font-medium">Kota/Kabupaten:</label>
            <input type="text" name="address[kota_kabupaten]" value="{{ $user->address['kota_kabupaten'] ?? '' }}" class="w-full p-2 border rounded mb-3">

            <label class="block font-medium">Kecamatan:</label>
            <input type="text" name="address[kecamatan]" value="{{ $user->address['kecamatan'] ?? '' }}" class="w-full p-2 border rounded mb-3">

            <label class="block font-medium">Kode Pos:</label>
            <input type="text" name="address[kode_pos]" value="{{ $user->address['kode_pos'] ?? '' }}" class="w-full p-2 border rounded mb-3">

            <label class="block font-medium">Alamat Lengkap:</label>
            <textarea name="address[alamat_lengkap]" class="w-full p-2 border rounded mb-3">{{ $user->address['alamat_lengkap'] ?? '' }}</textarea>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Simpan Perubahan
            </button>
        </form>
    </div>
</div>
@endsection
