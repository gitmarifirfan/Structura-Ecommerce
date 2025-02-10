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

<body class="font-Montserrat bg-white">
    <x-navbar> </x-navbar>

    <section class="">
        <div class="min-h-screen flex flex-col items-center justify-center py-2 px-2 text-darkblue">
            <div class="grid md:grid-cols-2 items-center gap-10 max-w-6xl w-full px-4 md:px-0">
                <div>
                    <h2 class="lg:text-5xl text-4xl font-extrabold lg:leading-[55px] text-gray-800 animate-popUpOut">
                        Halo, Selamat Datang Di Structura !
                    </h2>
                    <p class="text-sm mt-6 text-gray-800 animate-popUpOut ">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate accusamus quia commodi odit?
                        Praesentium nostrum neque ad obcaecati earum doloremque?
                    </p>
                    <p class="text-sm mt-12 text-gray-800 animate-popUpOut">
                        Don't have an account? <a href="{{ route('register') }}"
                            class="text-silver-text-custom font-semibold hover:underline ml-1">Register here</a>
                    </p>
                </div>

                <form class="max-w-md md:ml-auto w-full space-y-6 tablet:m-auto phone:m-auto ">
                    <h3 class="text-gray-800 text-3xl font-extrabold mb-8 animate-popUpOut">Sign in</h3>

                    <div class="space-y-4">
                        <div class="animate-popUpOut">
                            <input name="email" type="email" autocomplete="email" required
                                class="bg-gray-[#F3F4F6] w-full text-sm text-gray-800 px-4 py-3.5 rounded-md outline-slate-900 focus:bg-transparent border-none"
                                placeholder="Email address" />
                        </div>
                        <div class="animate-popUpOut">
                            <input name="password" type="password" autocomplete="current-password" required
                                class="bg-gray-[#F3F4F6] w-full text-sm text-gray-800 px-4 py-3.5 rounded-md outline-slate-900 focus:bg-transparent border-none"
                                placeholder="Password" />
                        </div>
                        <div class="flex flex-wrap items-center justify-between gap-4 ">
                            <div class="flex items-center animate-popUpOut">
                                <input id="remember-me" name="remember-me" type="checkbox"
                                    class="h-4 w-4 text-silver-text-custom focus:ring-slate-900 border-gray-300 rounded" />
                                <label for="remember-me"
                                    class="ml-3 block text-sm text-gray-800 animate-popUpOut">Remember me</label>
                            </div>
                            <div class="text-sm animate-popUpOut">
                                <a href="javascript:void(0);"
                                    class="text-silver-text-custom hover:text-slate-900 font-semibold ">Forgot your
                                    password?</a>
                            </div>
                        </div>
                    </div>

                    <div>
                        <button type="button"
                            class="bg-darkblue w-full shadow-xl py-2.5 px-4 text-sm font-semibold rounded text-white bg-silver-custom1 hover:bg-slate-800 focus:outline-none
                            animate-popUpOut">
                            <a href="dashboard-user/katalog.html">Log in</a>
                        </button>
                    </div>

                    <div class="space-x-6 flex justify-center mt-8">
                        <button type="button"
                            class="border-none outline-none w-[25px] h-[25px] phone:w-[30px] phone:h-[30px] animate-popUpOut">
                            <img src="{{ asset('images/icons/login/google.png') }}" alt="Social Media Icon">
                        </button>
                        <button type="button"
                            class="border-none outline-none  w-[25px] h-[25px] phone:w-[30px] phone:h-[30px] animate-popUpOut">
                            <img src="{{ asset('images/icons/login/facebook.png') }}" alt="Social Media Icon">
                        </button>
                        <button type="button"
                            class="border-none outline-none  w-[25px] h-[25px] phone:w-[30px] phone:h-[30px] animate-popUpOut">
                            <img src="{{ asset('images/icons/login/microsoft.png') }}" alt="Social Media Icon">
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script src="navbar.js"></script>
</body>

</html>
