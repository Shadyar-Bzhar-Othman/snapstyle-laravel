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
            <h1 class="text-2xl font-black">SnapStyle</h1>
        </div>
        <ul class="flex items-center space-x-5">
            <li>
                <a href="/"
                    class="text-base text-black pb-1 transition-all duration-500 ease-in-out hover:text-primaryColor">
                    Home
                </a>
            </li>
            <li>
                <a href="/products"
                    class="text-base text-black pb-1 transition-all duration-500 ease-in-out hover:text-primaryColor">
                    Products
                </a>
            </li>
            </li>
            <a href="#" class="text-black pb-1 transition-all duration-500 ease-in-out hover:text-primaryColor">
                Sale
            </a>
            <a href="/cart" class="text-black pb-1 transition-all duration-500 ease-in-out hover:text-primaryColor">
                Cart
            </a>
            <form action="" method="POST">
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

    <footer class="bg-slate-100 px-8 py-4">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-black mb-2">SnapStyle</h1>
                <p>Lorem ipsum dolor sit</p>
                <p>amet consectetur adipisicing elit. Dolores, expedita!</p>
            </div>
            <ul class="flex items-center space-x-6">
                <li>
                    <a href="/"
                        class="text-base text-black pb-1 transition-all duration-500 ease-in-out hover:text-primaryColor">
                        Home
                    </a>
                </li>
                <li>
                    <a href="/products"
                        class="text-base text-black pb-1 transition-all duration-500 ease-in-out hover:text-primaryColor">
                        Products
                    </a>
                </li>
                </li>
                <a href="#"
                    class="text-black pb-1 transition-all duration-500 ease-in-out hover:text-primaryColor">
                    Sale
                </a>
                <a href="/cart"
                    class="text-black pb-1 transition-all duration-500 ease-in-out hover:text-primaryColor">
                    Cart
                </a>
            </ul>
        </div>
        <hr class="my-6">
        <div class="flex justify-between items-center">
            <h3><a href="#">Privacy Policy</a></h3>
            <h3><a href="#">@ 2023 ShadyarBzharOthman</a></h3>
            <h3><a href="#">Terms & Conditions</a></h3>
        </div>
    </footer>
</body>

</html>
