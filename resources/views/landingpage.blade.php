<!DOCTYPE html>
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
    {{-- Navbar --}}
    <x-navbar></x-navbar>
    {{-- Image Top Landingpage --}}
    <div class="mt-8 mx-auto bg-smoothcream h-[300px] w-full md:w-[1280px] relative bg-cover bg-center rounded-[10px]"
        style="background-image: url('{{ asset('images/landingpages/contructionsimage.png') }}');">
        {{-- inside content --}}
        <div
            class="absolute inset-0 flex flex-col items-start justify-center text-darkblue text-xl md:text-2xl font-bold px-4">
            {{-- Teks dan tombol dalam satu kolom --}}
            <div class="w-1/2 max-w-lg ml-8">
                <p class="text-left">
                    Paket renovasi terbaik! Lengkapi kebutuhan pembangunan Anda dengan harga ekonomis dan kualitas
                    terjamin!
                </p>
                {{-- Beli Sekarang Button --}}
                <button class="mt-4 px-10 py-2 bg-darkblue text-white font-semibold rounded-[10px] text-[16px]">
                    Beli Sekarang !
                </button>
            </div>
        </div>
    </div>
    {{-- Category Section --}}
    <x-category> </x-category>

    {{-- Descript Section --}}
    <div class="mx-auto text-center py-16 px-6 w-full md:w-[1280px] rounded-[10px] mt-8"
        style="background-image: url({{ asset('images/landingpages/Footer-Landing-Page-1.png') }}); background-size: cover; background-position: center;">
        <h1 class="text-4xl font-bold text-[#1E375A]">Hai, kami STRUCTURA.</h1>
        <p class="text-gray-600 mt-4">
            STRUCTURA adalah platform e-commerce bahan bangunan yang menyediakan material konstruksi berkualitas tinggi
            dengan harga terjangkau. Berfokus pada kebutuhan para profesional di industri pembangunan, STRUCTURA
            menghadirkan
            solusi lengkap mulai dari material dasar hingga alat berat. Kami berkomitmen mendukung pembangunan yang
            efisien dan
            inovatif, sekaligus memberdayakan pasar lokal dengan produk terbaik yang memenuhi standar global.
        </p>
    </div>
    {{--  --}}
    <div class="mx-auto text-center">
        <h1 class="mt-8 mb-8 font-extrabold text-darkblue text-xl"> TERBARU DI STRUCTURA</h1>
    </div>
    {{--  --}}
    <div class="mx-auto mb-8 h-[350px] w-full md:w-[1280px] flex items-center justify-center">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 p-4 w-full">
            {{-- card 1 --}}
            <div class="bg-white p-4 text-left w-[250px] h-[310px] text-darkblue">
                <img src="{{ asset('images/landingpages/category/paint-colour-tins.jpg') }}" alt="Material Konstruksi"
                    class="w-[200px] h-[200px] object-cover mx-auto">
                <h2 class="mt-2 text-[16px] font-semibold ml-2">Cat Tembok</h2>
                <p class=" ml-2 font-light text-[12px] ">Merk: Nippon Paint</p>
                <p class=" font-extrabold ml-2 text-[14px]">Rp 250.000</p>
            </div>
            {{-- card 2 --}}
            <div class="bg-white p-4 text-left w-[250px] h-[310px] text-darkblue">
                <img src="{{ asset('images/landingpages/category/paint-colour-tins.jpg') }}" alt="Material Konstruksi"
                    class="w-[200px] h-[200px] object-cover mx-auto">
                <h2 class="mt-2 text-[16px] font-semibold ml-2">Cat Tembok</h2>
                <p class=" ml-2 font-light text-[12px] ">Merk: Nippon Paint</p>
                <p class=" font-extrabold ml-2 text-[14px]">Rp 250.000</p>
            </div>
            {{-- card 3 --}}
            <div class="bg-white p-4 text-left w-[250px] h-[310px] text-darkblue">
                <img src="{{ asset('images/landingpages/category/paint-colour-tins.jpg') }}" alt="Material Konstruksi"
                    class="w-[200px] h-[200px] object-cover mx-auto">
                <h2 class="mt-2 text-[16px] font-semibold ml-2">Cat Tembok</h2>
                <p class=" ml-2 font-light text-[12px] ">Merk: Nippon Paint</p>
                <p class=" font-extrabold ml-2 text-[14px]">Rp 250.000</p>
            </div>
            {{-- card 4 --}}
            <div class="bg-white p-4 text-left w-[250px] h-[310px] text-darkblue">
                <img src="{{ asset('images/landingpages/category/paint-colour-tins.jpg') }}" alt="Material Konstruksi"
                    class="w-[200px] h-[200px] object-cover mx-auto">
                <h2 class="mt-2 text-[16px] font-semibold ml-2">Cat Tembok</h2>
                <p class=" ml-2 font-light text-[12px] ">Merk: Nippon Paint</p>
                <p class=" font-extrabold ml-2 text-[14px]">Rp 250.000</p>
            </div>
        </div>
    </div>
    {{--  --}}
    <div
        class="mt-8 mb-16 mx-auto bg-darkblue h-[200px] w-full md:w-[1280px] relative bg-cover bg-center rounded-[10px]">
        {{-- image --}}
        <div class="absolute left-0 h-full w-[600px] bg-gray-500 rounded-l-[10px] flex items-center justify-center">
            <img src="{{ asset('images/landingpages/exploremore.png') }}" alt="Material Konstruksi"
                class="w-[550px] h-[160px] object-cover">
        </div>
        {{-- inside content --}}
        <div
            class="absolute inset-0 flex flex-col items-end justify-center text-white text-xl md:text-2xl font-bold px-4 w-full">
            <div class="w-1/2 ml-auto mr-6 text-right">
                <p class=" font-medium ">EXPLORE MORE AND MORE</p>
                <div class="leading-none">
                    <p class=" ml-[280px] text-left text-[12px] font-thin">Temukan lebih banyak produk berkualitas
                        untuk proyek</p>
                    <p class="w-1/2 ml-[280px] text-left text-[12px] font-thin">konstruksi Anda di sini.</p>
                </div>
                <button class="mt-4 mr-[110px] px-10 py-2 bg-white text-darkblue font-semibold rounded-[10px] text-[16px]" >
                    Belanja Sekarang !
                </button>
            </div>
        </div>
    </div>

</body>

</html>
