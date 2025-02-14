<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Changa:wght@200..800&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <title>Structura Toko Terbaik</title>
    @vite('resources/css/app.css')
    {{-- <style>
        * {
            border: solid 1px red
        }
    </style> --}}
</head>

<body class="bg-gray-100 font-Montserrat">

    <x-navbar></x-navbar>

    <div
        class="container mt-8 mx-auto w-full md:w-[1280px] relative bg-cover bg-center rounded-[10px]">
        <div class="flex justify-between items-center mb-4">
            <nav class="text-sm text-blue-500">
                <a href="#" class="hover:underline">HOME</a> /
                <a href="#" class="hover:underline">ALL PRODUCT</a>
            </nav>
            <div class="text-sm text-blue-500">
                <a href="#" class="hover:underline">RETURN PRODUCTS</a>
            </div>
        </div>

        <h1 class="text-3xl font-bold text-center mt-6">TOKO KAMI</h1>

        <div class="flex flex-col md:flex-row gap-6 mt-10">
            <div class="w-full md:w-1/2 bg-white rounded-xl shadow-lg overflow-hidden p-4">
                <img src="https://via.placeholder.com/600x400" alt="Map" class="w-full rounded-lg">
            </div>

            <div class="w-full md:w-1/2 space-y-4">
                <div class="bg-white p-4 rounded-xl shadow-md flex justify-between items-center">
                    <div>
                        <h2 class="font-bold">Kraton - Kab. Pasuruan</h2>
                        <p class="text-gray-600 text-sm">TB. Rizki Jaya, Jalan ponpes terpadu al-yasini, desa kebotohan,
                            kecamatan kraton, kab. Pasuruan</p>
                    </div>
                    <span>📍</span>
                </div>
                <div class="bg-white p-4 rounded-xl shadow-md flex justify-between items-center">
                    <div>
                        <h2 class="font-bold">Purwosari - Kab. Pasuruan</h2>
                        <p class="text-gray-600 text-sm">TB. Rizki Jaya 5, Pakem, Purwosari, Kab. Pasuruan</p>
                    </div>
                    <span>📍</span>
                </div>
                <div class="bg-white p-4 rounded-xl shadow-md flex justify-between items-center">
                    <div>
                        <h2 class="font-bold">Karangploso - Kab. Malang</h2>
                        <p class="text-gray-600 text-sm">TB. Rizki Jaya 4, Desa Bocek, Kec. Karangploso, Kab. Malang</p>
                    </div>
                    <span>📍</span>
                </div>
            </div>
        </div>
    </div>


</body>

</html>
