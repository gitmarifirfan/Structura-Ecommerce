<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col">
        <!-- Navbar -->
        <nav class="bg-blue-600 text-white p-4 flex justify-between">
            <h1 class="text-lg font-bold">Profil Saya</h1>
            <a href="{{ route('dashboard') }}" class="bg-gray-500 px-4 py-2 rounded hover:bg-gray-600">
                Kembali ke Dashboard
            </a>
        </nav>

        <!-- Konten Profil -->
        <div class="container mx-auto p-6">
            <div class="bg-white shadow p-6 rounded-lg">
                <h2 class="text-2xl font-bold">Informasi Akun</h2>
                <p class="text-gray-600"><strong>Email:</strong> {{ Auth::user()->email }}</p>

                <p class="text-gray-600"><strong>Nama:</strong> {{ Auth::user()->name }}</p>
                <p class="text-gray-600"><strong>Alamat:</strong> {{ Auth::user()->address ?? 'Belum diisi' }}</p>

                <!-- Form Update Profil -->
                <h3 class="text-xl font-semibold mt-6">Update Profil</h3>
                <form action="{{ route('profile.update') }}" method="POST" class="mt-4">
                    @csrf
                    @method('PUT')

                    <label class="block font-medium">Nama:</label>
                    <input type="text" name="name" value="{{ Auth::user()->name }}" class="w-full p-2 border rounded mb-3">

                    <label class="block font-medium">Alamat:</label>
                    <input type="text" name="address" value="{{ Auth::user()->address }}" class="w-full p-2 border rounded mb-3">

                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        Simpan Perubahan
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
