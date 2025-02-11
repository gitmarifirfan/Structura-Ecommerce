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
            <div>
                <a href="{{ route('profile') }}" class="bg-green-500 px-4 py-2 rounded hover:bg-green-600">
                    Profil Saya
                </a>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="bg-red-500 px-4 py-2 rounded hover:bg-red-600">
                        Logout
                    </button>
                </form>
            </div>
        </nav>

        <!-- Konten Dashboard -->
        <div class="container mx-auto p-6">
            <h2 class="text-2xl font-bold">Selamat Datang, {{ Auth::user()->name }} 🎉</h2>
            <p class="text-gray-700 mt-2">Ini adalah halaman dashboard.</p>
        </div>
    </div>
</body>
</html>
