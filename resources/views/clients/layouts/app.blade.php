<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Aplikasi Saya')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-blue-600 text-white p-4 flex justify-between">
        <h1 class="text-lg font-bold">Structura</h1>
        <a href="{{ route('dashboard') }}" class="bg-gray-500 px-4 py-2 rounded hover:bg-gray-600">
            Dashboard
        </a>
    </nav>

    <!-- Konten -->
    <div class="container mx-auto p-6">
        @yield('content')
    </div>

</body>
</html>
