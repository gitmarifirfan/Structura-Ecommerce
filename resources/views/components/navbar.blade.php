<div clas>
    <!-- Top Bar -->
    <div class="bg-darkblue text-white text-sm py-2 px-8 flex justify-between items-center w-full laptop:w-[1280px]  ">
        <div class="relative">
            <img src="{{ asset('images/icons/Call.png') }}" alt="phone-icon"
                class="absolute left-2 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-500">
            <p class=" pl-10 pr-4">+62 813-5929-8128</p>
        </div>
        <span class="text-xs">
            Shop Something Special Today!
        </span>
        <div class="flex gap-3">
            <a href="#" class="hover:opacity-75">
                <img src="{{ asset('images/icons/Instagram.png') }}" alt="Camera Icon" class="w-5 h-5">
            </a>
            <a href="#" class="hover:opacity-75">
                <img src="{{ asset('images/icons/Youtube.png') }}" alt="Video Icon" class="w-5 h-5">
            </a>
            <a href="#" class="hover:opacity-75">
                <img src="{{ asset('images/icons/Facebook.png') }}" alt="Book Icon" class="w-5 h-5">
            </a>
        </div>
    </div>
</div>
<div class="sticky top-0 z-50">
    <!-- Navbar -->
    <nav class="bg-white px-6 py-4 w-full laptop:w-[1280px]">
        <div class="flex justify-between items-center max-w-7xl mx-auto">
            <!-- Logo -->
            <a href="{{ route('landingpage')}}">
                <div class="text-[32px] font-extrabold font-Changa text-darkblue">
                    STRUCTURA.
                </div>
            </a>

            <!-- Menu -->
            <div class="hidden md:flex space-x-8 text-darkblue font-medium">
                <button class="hover:text-gray-600">Koleksi Baru</button>
                <button class="hover:text-gray-600">Produk</button>
                <a href="#" class="hover:text-gray-600">Lokasi Toko</a>
            </div>

            <!-- Icons -->
            <div class="flex space-x-4 text-darkblue">
                <!-- Search Bar -->
                <div class="relative">
                    <!-- Search Icon -->
                    <img src="{{ asset('images/icons/Search.png') }}" alt="Search Icon"
                        class="absolute left-2 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-500">

                    <!-- Input Field -->
                    <input type="text" placeholder="Search..."
                        class="w-35 h-8 py-2 pl-10 pr-4 rounded-md border-none focus:outline-none focus:ring-1 focus:ring-darkblue" />
                </div>

                <!-- Cart Icon -->
                <button class="hover:text-gray-600">
                    <img src="{{ asset('images/icons/Vector.png') }}" alt="Cart Icon" class="w-5 h-5">
                </button>

                <a href="{{ route('login') }}" class="hover:text-gray-600 inline-flex items-center">
                    <img src="{{ asset('images/icons/User Profile.png') }}" alt="User Icon" class="w-6 h-6">
                </a>
            </div>


        </div>
</div>
</nav>
</div>
