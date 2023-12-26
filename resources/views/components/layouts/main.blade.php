<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SnapStyle</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/3a78b9f26f.js" crossorigin="anonymous" defer></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    @vite('resources/css/app.css')
</head>

<body>
    {{-- <nav class="flex justify-between items-center px-12 py-4">
        <div>
            <h1 class="text-2xl font-black"><a href="{{ route('home') }}">SnapStyle</a></h1>
        </div>
        <ul class="flex items-center space-x-5">
            <li>
                <a href="{{ route('home') }}"
                    class="text-base text-black pb-1 transition-all duration-500 ease-in-out hover:text-primaryColor">
                    Home
                </a>
            </li>
            <li>
                <a href="{{ route('products.index') }}"
                    class="text-base text-black pb-1 transition-all duration-500 ease-in-out hover:text-primaryColor">
                    Products
                </a>
            </li>

            <li>
                <a href="{{ route('cart.index') }}"
                    class="text-black pb-1 transition-all duration-500 ease-in-out hover:text-primaryColor">
                    Cart
                </a>
            </li>

            <li>
                <a href="{{ route('about') }}"
                    class="text-black pb-1 transition-all duration-500 ease-in-out hover:text-primaryColor">
                    About
                </a>
            </li>

            <li>
                <a href="{{ route('contact') }}"
                    class="text-black pb-1 transition-all duration-500 ease-in-out hover:text-primaryColor">
                    Contact
                </a>
            </li>
            @auth
                @admin
                    <li>
                        <a href="{{ route('dashboard') }}"
                            class="text-black pb-1 transition-all duration-500 ease-in-out hover:text-primaryColor">
                            Dashboard
                        </a>
                    </li>
                @endadmin
                <form action="{{ route('logout') }}" method="POST">
                    @csrf

                    <x-form.button>Logout</x-form.button>
                </form>
            @else
                <a href="{{ route('register') }}"
                    class="text-black pb-1 transition-all duration-500 ease-in-out hover:text-primaryColor">
                    Register
                </a>
                <a href="{{ route('login') }}"
                    class="text-black pb-1 transition-all duration-500 ease-in-out hover:text-primaryColor">
                    Login
                </a>
            @endauth
            <form action="#" method="POST">
                @csrf

                <input type="text" name="search" placeholder="Search" value="{{ old('search') }}"
                    class="px-3 py-1 border border-slate-300 outline-none rounded ">
                <x-form.button>Search</x-form.button>
            </form>
        </ul>
    </nav> --}}

    <nav x-data="{ open: false }" class="flex justify-between items-center px-12 py-4">
        <div>
            <h1 class="text-2xl font-black"><a href="{{ route('home') }}">SnapStyle</a></h1>
        </div>

        <!-- Button for small screens -->
        <button @click="open = !open" class="sm:hidden text-2xl text-primaryColor focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
        </button>

        <!-- Navigation items for large screens -->
        <ul class="hidden sm:flex items-center space-x-5">
            <li>
                <a href="{{ route('home') }}"
                    class="text-base text-black pb-1 transition-all duration-500 ease-in-out hover:text-primaryColor">
                    Home
                </a>
            </li>
            <li>
                <a href="{{ route('products.index') }}"
                    class="text-base text-black pb-1 transition-all duration-500 ease-in-out hover:text-primaryColor">
                    Products
                </a>
            </li>
            <li>
                <a href="{{ route('cart.index') }}"
                    class="text-black pb-1 transition-all duration-500 ease-in-out hover:text-primaryColor">
                    Cart
                </a>
            </li>
            <li>
                <a href="{{ route('orders.index') }}"
                    class="text-black pb-1 transition-all duration-500 ease-in-out hover:text-primaryColor">
                    Orders
                </a>
            </li>
            @auth
                @admin
                    <li>
                        <a href="{{ route('dashboard') }}"
                            class="text-black pb-1 transition-all duration-500 ease-in-out hover:text-primaryColor">
                            Dashboard
                        </a>
                    </li>
                @endadmin
                <form action="{{ route('logout') }}" method="POST">
                    @csrf

                    <x-form.button>Logout</x-form.button>
                </form>
            @else
                <a href="{{ route('register') }}"
                    class="text-black pb-1 transition-all duration-500 ease-in-out hover:text-primaryColor">
                    Register
                </a>
                <a href="{{ route('login') }}"
                    class="text-black pb-1 transition-all duration-500 ease-in-out hover:text-primaryColor">
                    Login
                </a>
            @endauth
        </ul>

        <div x-show="open" @click="open = false"
            class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
            <div class="bg-white p-4 m-4 rounded shadow-md w-64">
                <ul class="flex flex-col space-y-2 relative">
                    <button @click="open = false" class="absolute top-2 right-2 text-gray-700 hover:text-primaryColor">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12">
                            </path>
                        </svg>
                    </button>
                    <li>
                        <a href="{{ route('home') }}"
                            class="text-base text-black pb-1 transition-all duration-500 ease-in-out hover:text-primaryColor">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('products.index') }}"
                            class="text-base text-black pb-1 transition-all duration-500 ease-in-out hover:text-primaryColor">
                            Products
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('cart.index') }}"
                            class="text-black pb-1 transition-all duration-500 ease-in-out hover:text-primaryColor">
                            Cart
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('orders.index') }}"
                            class="text-black pb-1 transition-all duration-500 ease-in-out hover:text-primaryColor">
                            Orders
                        </a>
                    </li>
                    @auth
                        @admin
                            <li>
                                <a href="{{ route('dashboard') }}"
                                    class="text-black pb-1 transition-all duration-500 ease-in-out hover:text-primaryColor">
                                    Dashboard
                                </a>
                            </li>
                        @endadmin
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf

                            <x-form.button>Logout</x-form.button>
                        </form>
                    @else
                        <a href="{{ route('register') }}"
                            class="text-black pb-1 transition-all duration-500 ease-in-out hover:text-primaryColor">
                            Register
                        </a>
                        <a href="{{ route('login') }}"
                            class="text-black pb-1 transition-all duration-500 ease-in-out hover:text-primaryColor">
                            Login
                        </a>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <main class="px-12 py-6">
        {{ $slot }}
    </main>

    <x-flash />

    <footer class="bg-slate-100 px-8 py-4">
        <div class="flex-col sm:flex-row flex justify-between items-center">
            <div class="text-center sm:text-start">
                <h1 class="text-2xl font-black mb-2"><a href="{{ route('home') }}">SnapStyle</a></h1>
                <p>Lorem ipsum dolor sit</p>
                <p>amet consectetur adipisicing elit. Dolores, expedita!</p>
            </div>
            <ul class="mt-4 flex flex-wrap justify-center items-center space-x-6">
                <li>
                    <a href="{{ route('home') }}"
                        class="text-base text-black pb-1 transition-all duration-500 ease-in-out hover:text-primaryColor">
                        Home
                    </a>
                </li>
                <li>
                    <a href="{{ route('products.index') }}"
                        class="text-base text-black pb-1 transition-all duration-500 ease-in-out hover:text-primaryColor">
                        Products
                    </a>
                </li>

                <li>
                    <a href="{{ route('cart.index') }}"
                        class="text-black pb-1 transition-all duration-500 ease-in-out hover:text-primaryColor">
                        Cart
                    </a>
                </li>
            </ul>
        </div>
        <hr class="my-6">
        <div class="flex-col sm:flex-row flex justify-between items-center">
            <h3><a href="#">Privacy Policy</a></h3>
            <h3><a href="https://shadyarbzharothman.netlify.app/">@ 2023 ShadyarBzharOthman</a></h3>
            <h3><a href="#">Terms & Conditions</a></h3>
        </div>
    </footer>
</body>

</html>
