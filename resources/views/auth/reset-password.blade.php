<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex justify-center items-center min-h-screen">

    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h2 class="text-2xl font-semibold text-center mb-6">Reset Password</h2>

        <!-- Pesan Error -->
        @if(session('error'))
            <div class="bg-red-100 text-red-700 p-3 rounded-lg text-center mb-4">
                {{ session('error') }}
            </div>
        @endif

        <!-- Form Reset Password -->
        <form action="{{ route('password.update') }}" method="POST">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium">Email:</label>
                <input type="email" name="email" id="email" required class="w-full p-2 border border-gray-300 rounded-lg">
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password Baru -->
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-medium">Password Baru:</label>
                <input type="password" name="password" id="password" required class="w-full p-2 border border-gray-300 rounded-lg">
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Konfirmasi Password -->
            <div class="mb-4">
                <label for="password_confirmation" class="block text-gray-700 font-medium">Konfirmasi Password:</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required class="w-full p-2 border border-gray-300 rounded-lg">
            </div>

            <!-- Tombol Reset Password -->
            <button type="submit" class="w-full bg-blue-600 text-white p-3 rounded-lg font-semibold hover:bg-blue-700 transition">
                Reset Password
            </button>
        </form>

        <!-- Kembali ke Login -->
        <div class="text-center mt-4 text-gray-600">
            <p>Sudah ingat password? <a href="{{ route('login.form') }}" class="text-blue-600 font-medium">Login</a></p>
        </div>
    </div>

</body>
</html>
