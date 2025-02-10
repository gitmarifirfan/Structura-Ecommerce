<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col">
        <!-- Navbar -->
        <nav class="bg-blue-600 text-white p-4 flex justify-between">
            <h1 class="text-lg font-bold">Dashboard</h1>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="bg-red-500 px-4 py-2 rounded hover:bg-red-600">
                    Logout
                </button>
            </form>

        </nav>

        <!-- Konten Dashboard -->
        <div class="container mx-auto p-6">
            <h2 class="text-2xl font-bold">Selamat Datang🎉</h2>
            <p class="text-gray-700 mt-2">Ini adalah halaman dashboard setelah login.</p>

            <!-- Menu Navigasi -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
                <a href="#" class="bg-white shadow p-4 rounded-lg hover:shadow-lg">
                    <h3 class="text-xl font-semibold">Laporan</h3>
                    <p class="text-gray-600">Lihat laporan harian Anda.</p>
                </a>
                <a href="#" class="bg-white shadow p-4 rounded-lg hover:shadow-lg">
                    <h3 class="text-xl font-semibold">Pengaturan</h3>
                    <p class="text-gray-600">Sesuaikan pengaturan akun.</p>
                </a>
            </div>
        </div>
    </div>
</body>
</html>
