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
    <nav class="flex justify-between items-center px-12 py-4">
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
            <ul class="mt-4 flex items-center space-x-6">
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
