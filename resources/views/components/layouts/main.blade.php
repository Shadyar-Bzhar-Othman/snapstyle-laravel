@props(['pd' => 'true'])

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SnapStyle</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Syne&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/3a78b9f26f.js" crossorigin="anonymous" defer></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    @vite('resources/css/app.css')
</head>

<body class="flex flex-col min-h-screen">
    <nav x-data="{ open: false }" class="flex justify-between items-center px-12 py-4">
        <div>
            <h1 class="text-2xl font-bold"><a href="{{ route('home') }}">SnapStyle</a></h1>
        </div>

        <button @click="open = !open" class="sm:hidden text-2xl text-primaryColor focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
        </button>

        <ul class="hidden sm:flex items-center space-x-5">
            <li>
                <a href="{{ route('home') }}"
                    class="text-base text-blackColor pb-1 transition-all duration-500 ease-in-out hover:text-primaryColor
                    @if (request()->routeIs('home')) border-b border-primaryColor @endif">
                    Home
                </a>
            </li>
            <li>
                <a href="{{ route('products.index') }}"
                    class="text-base text-blackColor pb-1 transition-all duration-500 ease-in-out hover:text-primaryColor
                    @if (request()->routeIs('products.index')) border-b border-primaryColor @endif">
                    Products
                </a>
            </li>
            <li>
                <a href="{{ route('cart.index') }}"
                    class="text-blackColor pb-1 transition-all duration-500 ease-in-out hover:text-primaryColor
                    @if (request()->routeIs('cart.index')) border-b border-primaryColor @endif">
                    Cart
                </a>
            </li>
            <li>
                <a href="{{ route('orders.index') }}"
                    class="text-blackColor pb-1 transition-all duration-500 ease-in-out hover:text-primaryColor
                    @if (request()->routeIs('orders.index')) border-b border-primaryColor @endif">
                    Orders
                </a>
            </li>
            @auth
                @admin
                    <li>
                        <a href="{{ route('dashboard') }}"
                            class="text-blackColor pb-1 transition-all duration-500 ease-in-out hover:text-primaryColor
                            @if (request()->routeIs('dashboard')) border-b border-primaryColor @endif">
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
                    class="text-blackColor pb-1 transition-all duration-500 ease-in-out hover:text-primaryColor
                    @if (request()->routeIs('register')) border-b border-primaryColor @endif">
                    Register
                </a>
                <a href="{{ route('login') }}"
                    class="text-blackColor pb-1 transition-all duration-500 ease-in-out hover:text-primaryColor
                    @if (request()->routeIs('login')) border-b border-primaryColor @endif">
                    Login
                </a>
            @endauth
        </ul>

        <div x-show="open" @click="open = false"
            class="fixed inset-0 bg-blackColor bg-opacity-50 flex items-center justify-center">
            <div class="bg-whiteColor p-4 m-4 rounded shadow-md w-64">
                <ul class="flex flex-col space-y-2 relative">
                    <button @click="open = false"
                        class="absolute top-2 right-2 text-darkgreyColor hover:text-primaryColor">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12">
                            </path>
                        </svg>
                    </button>
                    <li>
                        <a href="{{ route('home') }}"
                            class="text-base text-blackColor pb-1 transition-all duration-500 ease-in-out hover:text-primaryColor
                            @if (request()->routeIs('home')) border-b border-primaryColor @endif">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('products.index') }}"
                            class="text-base text-blackColor pb-1 transition-all duration-500 ease-in-out hover:text-primaryColor
                            @if (request()->routeIs('products.index')) border-b border-primaryColor @endif">
                            Products
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('cart.index') }}"
                            class="text-blackColor pb-1 transition-all duration-500 ease-in-out hover:text-primaryColor
                            @if (request()->routeIs('cart.index')) border-b border-primaryColor @endif">
                            Cart
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('orders.index') }}"
                            class="text-blackColor pb-1 transition-all duration-500 ease-in-out hover:text-primaryColor
                            @if (request()->routeIs('orders.index')) border-b border-primaryColor @endif">
                            Orders
                        </a>
                    </li>
                    @auth
                        @admin
                            <li>
                                <a href="{{ route('dashboard') }}"
                                    class="text-blackColor pb-1 transition-all duration-500 ease-in-out hover:text-primaryColor
                                    @if (request()->routeIs('dashboard')) border-b border-primaryColor @endif">
                                    Dashboard
                                </a>
                            </li>
                        @endadmin
                        <form action="{{ route('logout') }}" method="POST" class="mt-2">
                            @csrf

                            <x-form.button>Logout</x-form.button>
                        </form>
                    @else
                        <a href="{{ route('register') }}"
                            class="text-blackColor pb-1 transition-all duration-500 ease-in-out hover:text-primaryColor
                            @if (request()->routeIs('register')) border-b border-primaryColor @endif">
                            Register
                        </a>
                        <a href="{{ route('login') }}"
                            class="text-blackColor pb-1 transition-all duration-500 ease-in-out hover:text-primaryColor
                            @if (request()->routeIs('login')) border-b border-primaryColor @endif">
                            Login
                        </a>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <main class="@if ($pd == 'true') px-12 @endif py-6 grow">
        {{ $slot }}
    </main>

    <x-flash />

    <footer class="bg-greyColor px-8 py-4">
        <div class="flex-col sm:flex-row flex justify-between items-center">
            <div class="text-center sm:text-start">
                <h1 class="text-2xl font-black mb-2 text-primaryColor"><a href="{{ route('home') }}">SnapStyle</a></h1>
                <p>Discover Your Distinctive Look</p>
                <p>Fashioned with Precision, Worn with Confidence</p>
            </div>
            <ul class="mt-4 flex flex-wrap justify-center items-center space-x-6">
                <li>
                    <a href="{{ route('home') }}"
                        class="text-base text-blackColor pb-1 transition-all duration-500 ease-in-out hover:text-primaryColor">
                        Home
                    </a>
                </li>
                <li>
                    <a href="{{ route('products.index') }}"
                        class="text-base text-blackColor pb-1 transition-all duration-500 ease-in-out hover:text-primaryColor">
                        Products
                    </a>
                </li>

                <li>
                    <a href="{{ route('cart.index') }}"
                        class="text-blackColor pb-1 transition-all duration-500 ease-in-out hover:text-primaryColor">
                        Cart
                    </a>
                </li>
            </ul>
        </div>
        <hr class="my-6">
        <div class="flex-col sm:flex-row flex justify-between items-center">
            <h3><a href="#">Privacy Policy</a></h3>
            <h3><a href="https://shadyarbzharothman.netlify.app/" class="text-primaryColor">@ 2023
                    ShadyarBzharOthman</a></h3>
            <h3><a href="#">Terms & Conditions</a></h3>
        </div>
    </footer>
</body>

</html>
