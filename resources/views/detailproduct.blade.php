<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Changa:wght@200..800&family=Montserrat:ital,wght@0,100..900&display=swap"
        rel="stylesheet">
    <title>Structura Toko Terbaik</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 font-Montserrat">
    <x-navbar></x-navbar>

    <div class="container mx-auto w-full md:w-[1280px] flex flex-col mt-8">
        {{-- breadcump --}}
        <div class="flex justify-between items-center mb-4">
            <nav class="text-sm text-blue-500">
                <a href="#" class="hover:underline">HOME</a> /
                <a href="#" class="hover:underline">ALL PRODUCT</a>
            </nav>
            <div class="text-sm text-blue-500">
                <a href="#" class="hover:underline">RETURN PRODUCTS</a>
            </div>
        </div>

        <div class="w-full max-w-4xl mx-auto mt-16">
            <div class="flex flex-col md:flex-row items-start gap-8 mt-10">
                {{-- product image --}}
                <div class="w-full md:w-[40%] max-w-sm mx-auto h-">
                    <div class="bg-white rounded-xl overflow-hidden shadow-lg">
                        <img src="{{ asset('images/landingpages/category/paint-colour-tins.jpg') }}" alt="Product">
                    </div>
                </div>

                {{-- product detail --}}
                <div class="w-full md:w-[60%]">
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-900">Pipa Plumbing Besar Dengan Berat 10Kg</h1>
                    <p class="text-red-600 text-2xl md:text-3xl font-bold mt-2">Rp 850.000</p>

                    <h3 class="text-lg font-semibold mt-4">Description</h3>
                    <p class="text-gray-600 mt-2 text-sm md:text-base leading-relaxed">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Non nam diam elit hac curae magna;
                        lobortis luctus. Finibus quisque massa, lacus ac dapibus nasetur. Gravida urna donec a bibendum
                        tempor condimentum. Ex velit penatibus dui ullamcorper fringilla magna dapibus.
                    </p>

                    <button class="bg-blue-900 hover:bg-blue-950 text-white font-semibold py-3 px-6 rounded-lg mt-6">
                        Add To Cart
                    </button>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
