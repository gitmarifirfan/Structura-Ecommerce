<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex justify-center items-center min-h-screen">

    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h2 class="text-2xl font-semibold text-center mb-6">Form Login</h2>

        <!-- Menampilkan Pesan Sukses -->
        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded-lg text-center mb-4">
                {{ session('success') }}
            </div>
            @if(session('token'))
                <div class="bg-gray-200 p-3 rounded-lg text-sm text-center break-words">
                    <strong>Token Anda:</strong> <br> {{ session('token') }}
                </div>
            @endif
        @endif

        <!-- Menampilkan Pesan Error -->
        @if(session('error'))
            <div class="bg-red-100 text-red-700 p-3 rounded-lg text-center mb-4">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium">Email:</label>
                <input type="email" name="email" id="email" required class="w-full p-2 border border-gray-300 rounded-lg">
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-medium">Password:</label>
                <input type="password" name="password" id="password" required class="w-full p-2 border border-gray-300 rounded-lg">
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tombol Login -->
            <button type="submit" class="w-full bg-blue-600 text-white p-3 rounded-lg font-semibold hover:bg-blue-700 transition">
                Login
            </button>
        </form>

        <!-- Link Registrasi -->
        <div class="text-center mt-4 text-gray-600">
            <p>Belum punya akun? <a href="{{ route('register.form') }}" class="text-blue-600 font-medium">Daftar</a></p>
        </div>
    </div>

</body>
</html>
