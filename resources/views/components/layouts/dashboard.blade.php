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
    @vite('resources/js/app.js')
</head>

<body>
    <div class="flex w-screen h-screen bg-gray-100">
        <nav class="w-auto sm:w-64 shadow text-white p-3 rounded-tr-xl rounded-br-xl">
            <h1 class="text-2xl text-primaryColor font-bold mb-2"><a href="{{ route('home') }}">SnapStyle</a></h1>
            <ul class="space-y-2 w-full">
                <li
                    class="transition-all duration-500 ease-in-out p-1 w-full rounded text-black hover:bg-primaryColor hover:text-white
                    @if (request()->routeIs('dashboard')) text-primaryColor @endif">
                    <a href="{{ route('dashboard') }}" class="text-base text-inherit">
                        Dashboard
                    </a>
                </li>
                <li
                    class="transition-all duration-500 ease-in-out p-1 w-full rounded text-black hover:bg-primaryColor hover:text-white
                    @if (request()->routeIs('dashboard.users.index')) text-primaryColor @endif">
                    <a href="{{ route('dashboard.users.index') }}" class="text-base text-inherit">
                        Users
                    </a>
                </li>
                <li
                    class="transition-all duration-500 ease-in-out p-1 w-full rounded text-black hover:bg-primaryColor hover:text-white
                    @if (request()->routeIs('dashboard.products.index')) text-primaryColor @endif">
                    <a href="{{ route('dashboard.products.index') }}" class="text-base text-inherit">
                        Products
                    </a>
                </li>
                <li
                    class="transition-all duration-500 ease-in-out p-1 w-full rounded text-black hover:bg-primaryColor hover:text-white
                    @if (request()->routeIs('dashboard.sizes.index')) text-primaryColor @endif">
                    <a href="{{ route('dashboard.sizes.index') }}" class="text-base text-inherit">
                        Sizes
                    </a>
                </li>
                <li
                    class="transition-all duration-500 ease-in-out p-1 w-full rounded text-black hover:bg-primaryColor hover:text-white
                    @if (request()->routeIs('dashboard.categories.index')) text-primaryColor @endif">
                    <a href="{{ route('dashboard.categories.index') }}" class="text-base text-inherit">
                        Category
                    </a>
                </li>
                <li
                    class="transition-all duration-500 ease-in-out p-1 w-full rounded text-black hover:bg-primaryColor hover:text-white
                    @if (request()->routeIs('dashboard.subcategories.index')) text-primaryColor @endif">
                    <a href="{{ route('dashboard.subcategories.index') }}" class="text-base text-inherit">
                        Sub Category
                    </a>
                </li>
                <li
                    class="transition-all duration-500 ease-in-out p-1 w-full rounded text-black hover:bg-primaryColor hover:text-white
                    @if (request()->routeIs('dashboard.orders.index')) text-primaryColor @endif">
                    <a href="{{ route('dashboard.orders.index') }}" class="text-base text-inherit">
                        Orders
                    </a>
                </li>
            </ul>
        </nav>

        <main class="flex-1 p-8 overflow-auto">
            {{ $slot }}
        </main>

        <x-flash />
    </div>
</body>

</html>
