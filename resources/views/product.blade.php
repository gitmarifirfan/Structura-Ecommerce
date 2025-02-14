<!DOCTYPE html>
<html lang="en">

<head>
    <html lang="en">

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

    <div class="container mx-auto flex gap-6">
        {{-- sidebar --}}
        <aside class="w-1/6 p-3 bg-smoothcream rounded-lg h-auto self-start text-sm space-y-3 pl-10">
            <h2 class="font-semibold mb-3">Showing 612 Products</h2>
            <div class="mb-3">
                <h3 class="font-semibold mb-2">Price</h3>
                <div class="flex justify-right gap-1">
                    <p class="text-xl">Rp.</p>
                    <input type="text" placeholder="From" class="w-[35%] p-1 border rounded text-sm">
                    <input type="text" placeholder="To" class="w-[35%] p-1 border rounded text-sm">
                </div>

            </div>
            <div>
                <h3 class="font-semibold mb-2">Sub Category</h3>
                <ul class="space-y-3">
                    <li><label><input type="checkbox" class="mr-1">Material Konstruksi</label></li>
                    <li><label><input type="checkbox" class="mr-1">Besi & Baja</label></li>
                    <li><label><input type="checkbox" class="mr-1">Atap & Rangka</label></li>
                    <li><label><input type="checkbox" class="mr-1">Kayu & Plywood</label></li>
                    <li><label><input type="checkbox" class="mr-1">Cat & Pelapis</label></li>
                    <li><label><input type="checkbox" class="mr-1">Plumbing</label></li>
                    <li><label><input type="checkbox" class="mr-1">Listrik & Elektrikal</label></li>
                    <li><label><input type="checkbox" class="mr-1">Pintu & Jendela</label></li>
                    <li><label><input type="checkbox" class="mr-1">Keramik & Lantai</label></li>
                    <li><label><input type="checkbox" class="mr-1">Perlengkapan Kerja</label></li>
                </ul>
                <button class="text-blue-500 mt-2 text-xs">+ Show more</button>
            </div>
        </aside>

        {{-- main --}}
        <main class="flex-1">
            <div class="flex justify-between items-center mb-4">
                <nav class="text-sm text-blue-500">
                    <a href="#" class="hover:underline">HOME</a> /
                    <a href="#" class="hover:underline">ALL PRODUCT</a>
                </nav>
                <div class="flex items-center gap-2">
                    <span class="text-gray-600">Sort by</span>
                    <select class="p-2 w-[180px] border rounded">
                        <option>Price, low to high</option>
                        <option>Price, high to low</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-5 gap-6">
                {{-- product card --}}
                <div class="bg-white rounded-lg w-[220px] h-[300px] shadow overflow-hidden">
                    <img src="{{ asset('images/landingpages/category/paint-colour-tins.jpg') }}" alt="Product"
                        class="w-full h-40 object-cover">

                    <div class="p-4 pl-2">
                        <h3 class="text-sm font-semibold">Kompresor Angin 30L JDL Tools</h3>
                        <p class="text-red-600 font-semibold">Rp. 1,250,000</p>
                        <p class="text-gray-500 text-xs">Sold: 12 Terjual</p>
                    </div>
                </div>
                {{-- product card --}}
                <div class="bg-white rounded-lg w-[220px] h-[300px] shadow overflow-hidden">
                    <img src="{{ asset('images/landingpages/category/paint-colour-tins.jpg') }}" alt="Product"
                        class="w-full h-40 object-cover">

                    <div class="p-4 pl-2">
                        <h3 class="text-sm font-semibold">Kompresor Angin 30L JDL Tools</h3>
                        <p class="text-red-600 font-semibold">Rp. 1,250,000</p>
                        <p class="text-gray-500 text-xs">Sold: 12 Terjual</p>
                    </div>
                </div>
                {{-- product card --}}
                <div class="bg-white rounded-lg w-[220px] h-[300px] shadow overflow-hidden">
                    <img src="{{ asset('images/landingpages/category/paint-colour-tins.jpg') }}" alt="Product"
                        class="w-full h-40 object-cover">

                    <div class="p-4 pl-2">
                        <h3 class="text-sm font-semibold">Kompresor Angin 30L JDL Tools</h3>
                        <p class="text-red-600 font-semibold">Rp. 1,250,000</p>
                        <p class="text-gray-500 text-xs">Sold: 12 Terjual</p>
                    </div>
                </div>
                {{-- product card --}}
                <div class="bg-white rounded-lg w-[220px] h-[300px] shadow overflow-hidden">
                    <img src="{{ asset('images/landingpages/category/paint-colour-tins.jpg') }}" alt="Product"
                        class="w-full h-40 object-cover">

                    <div class="p-4 pl-2">
                        <h3 class="text-sm font-semibold">Kompresor Angin 30L JDL Tools</h3>
                        <p class="text-red-600 font-semibold">Rp. 1,250,000</p>
                        <p class="text-gray-500 text-xs">Sold: 12 Terjual</p>
                    </div>
                </div>
                {{-- product card --}}
                <div class="bg-white rounded-lg w-[220px] h-[300px] shadow overflow-hidden">
                    <img src="{{ asset('images/landingpages/category/paint-colour-tins.jpg') }}" alt="Product"
                        class="w-full h-40 object-cover">

                    <div class="p-4 pl-2">
                        <h3 class="text-sm font-semibold">Kompresor Angin 30L JDL Tools</h3>
                        <p class="text-red-600 font-semibold">Rp. 1,250,000</p>
                        <p class="text-gray-500 text-xs">Sold: 12 Terjual</p>
                    </div>
                </div>
                {{-- product card --}}
                <div class="bg-white rounded-lg w-[220px] h-[300px] shadow overflow-hidden">
                    <img src="{{ asset('images/landingpages/category/paint-colour-tins.jpg') }}" alt="Product"
                        class="w-full h-40 object-cover">

                    <div class="p-4 pl-2">
                        <h3 class="text-sm font-semibold">Kompresor Angin 30L JDL Tools</h3>
                        <p class="text-red-600 font-semibold">Rp. 1,250,000</p>
                        <p class="text-gray-500 text-xs">Sold: 12 Terjual</p>
                    </div>
                </div>
                {{-- product card --}}
                <div class="bg-white rounded-lg w-[220px] h-[300px] shadow overflow-hidden">
                    <img src="{{ asset('images/landingpages/category/paint-colour-tins.jpg') }}" alt="Product"
                        class="w-full h-40 object-cover">

                    <div class="p-4 pl-2">
                        <h3 class="text-sm font-semibold">Kompresor Angin 30L JDL Tools</h3>
                        <p class="text-red-600 font-semibold">Rp. 1,250,000</p>
                        <p class="text-gray-500 text-xs">Sold: 12 Terjual</p>
                    </div>
                </div>
                {{-- product card --}}
                <div class="bg-white rounded-lg w-[220px] h-[300px] shadow overflow-hidden">
                    <img src="{{ asset('images/landingpages/category/paint-colour-tins.jpg') }}" alt="Product"
                        class="w-full h-40 object-cover">

                    <div class="p-4 pl-2">
                        <h3 class="text-sm font-semibold">Kompresor Angin 30L JDL Tools</h3>
                        <p class="text-red-600 font-semibold">Rp. 1,250,000</p>
                        <p class="text-gray-500 text-xs">Sold: 12 Terjual</p>
                    </div>
                </div>


            </div>
        </main>
    </div>
</body>

</html>
