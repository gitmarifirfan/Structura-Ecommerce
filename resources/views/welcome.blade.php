<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang di E-Commerce</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-blue-600 text-white py-4">
        <div class="container mx-auto text-center">
            <h2 class="text-2xl font-bold">E-Commerce</h2>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="text-center py-16">
        <h1 class="text-4xl font-bold text-gray-800">Temukan Produk Terbaik untuk Anda</h1>
        <p class="text-gray-600 mt-2">Beli produk dengan harga terbaik dan kualitas terpercaya.</p>
        <div class="mt-6">
            <a href="{{ route('login') }}" class="px-6 py-2 bg-blue-600 text-white rounded-md mr-2 hover:bg-blue-700">Login</a>
            <a href="{{ route('register') }}" class="px-6 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">Daftar</a>
        </div>
    </div>

    <!-- Daftar Produk -->
    <div class="container mx-auto px-4">
        <h2 class="text-2xl font-semibold text-gray-700 text-center mb-6">Produk Pilihan</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            <div class="bg-white shadow-md rounded-lg p-4 text-center">
                <h3 class="text-lg font-semibold">Produk 1</h3>
                <p class="text-gray-600">Rp100.000</p>
            </div>

            <div class="bg-white shadow-md rounded-lg p-4 text-center">
                <h3 class="text-lg font-semibold">Produk 2</h3>
                <p class="text-gray-600">Rp150.000</p>
            </div>

            <div class="bg-white shadow-md rounded-lg p-4 text-center">
                <h3 class="text-lg font-semibold">Produk 3</h3>
                <p class="text-gray-600">Rp200.000</p>
            </div>
        </div>
    </div>

</body>
</html>
