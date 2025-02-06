<!-- resources/views/welcome.blade.php (atau halaman lainnya) -->

<!DOCTYPE html>
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
<style>
    * {
        border: solid 1px red
    }
</style>

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
            <!-- Teks dan tombol dalam satu kolom -->
            <div class="w-1/2 max-w-lg ml-8">
                <p class="text-left">
                    Paket renovasi terbaik! Lengkapi kebutuhan pembangunan Anda dengan harga ekonomis dan kualitas
                    terjamin!
                </p>
                {{-- Button Beli Sekarang --}}
                <button class="mt-4 px-10 py-2 bg-darkblue text-white font-semibold rounded-[10px] text-[16px]">
                    Beli Sekarang !
                </button>
            </div>
        </div>

    </div>



</body>

</html>
