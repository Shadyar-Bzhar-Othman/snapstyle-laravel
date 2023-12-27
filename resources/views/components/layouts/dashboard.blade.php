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
    <div x-data="{ open: true }" class="flex w-screen h-screen bg-whiteColor">
        <button @click="open = !open" class="absolute top-2 right-2 text-2xl text-primaryColor focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7">
                </path>
            </svg>
        </button>

        <nav x-show="open" @click.away="open = false"
            class="flex flex-col justify-between items-start w-auto sm:w-64 shadow text-whiteColor p-3 rounded-tr-xl rounded-br-xl">
            <div class="w-full">
                <h1 class="text-2xl text-primaryColor font-bold mb-2"><a href="{{ route('home') }}">SnapStyle</a></h1>
                <ul class="space-y-2 w-full">
                    <li
                        class="transition-all duration-500 ease-in-out p-1 w-full rounded text-blackColor hover:bg-primaryColor hover:text-whiteColor
                    @if (request()->routeIs('dashboard')) text-primaryColor @endif">
                        <a href="{{ route('dashboard') }}" class="text-base text-inherit">
                            Dashboard
                        </a>
                    </li>
                    <li
                        class="transition-all duration-500 ease-in-out p-1 w-full rounded text-blackColor hover:bg-primaryColor hover:text-whiteColor
                    @if (request()->routeIs('dashboard.users.index')) text-primaryColor @endif">
                        <a href="{{ route('dashboard.users.index') }}" class="text-base text-inherit">
                            Users
                        </a>
                    </li>
                    <li
                        class="transition-all duration-500 ease-in-out p-1 w-full rounded text-blackColor hover:bg-primaryColor hover:text-whiteColor
                    @if (request()->routeIs('dashboard.products.index')) text-primaryColor @endif">
                        <a href="{{ route('dashboard.products.index') }}" class="text-base text-inherit">
                            Products
                        </a>
                    </li>
                    <li
                        class="transition-all duration-500 ease-in-out p-1 w-full rounded text-blackColor hover:bg-primaryColor hover:text-whiteColor
                    @if (request()->routeIs('dashboard.sizes.index')) text-primaryColor @endif">
                        <a href="{{ route('dashboard.sizes.index') }}" class="text-base text-inherit">
                            Sizes
                        </a>
                    </li>
                    <li
                        class="transition-all duration-500 ease-in-out p-1 w-full rounded text-blackColor hover:bg-primaryColor hover:text-whiteColor
                    @if (request()->routeIs('dashboard.categories.index')) text-primaryColor @endif">
                        <a href="{{ route('dashboard.categories.index') }}" class="text-base text-inherit">
                            Category
                        </a>
                    </li>
                    <li
                        class="transition-all duration-500 ease-in-out p-1 w-full rounded text-blackColor hover:bg-primaryColor hover:text-whiteColor
                    @if (request()->routeIs('dashboard.subcategories.index')) text-primaryColor @endif">
                        <a href="{{ route('dashboard.subcategories.index') }}" class="text-base text-inherit">
                            Sub Category
                        </a>
                    </li>
                    <li
                        class="transition-all duration-500 ease-in-out p-1 w-full rounded text-blackColor hover:bg-primaryColor hover:text-whiteColor
                    @if (request()->routeIs('dashboard.orders.index')) text-primaryColor @endif">
                        <a href="{{ route('dashboard.orders.index') }}" class="text-base text-inherit">
                            Orders
                        </a>
                    </li>
                </ul>
            </div>
            <form action="{{ route('logout') }}" method="POST" class="mb-16">
                @csrf

                <x-form.button>Logout</x-form.button>
            </form>
        </nav>

        <main class="flex-1 p-8 overflow-auto">
            {{ $slot }}
        </main>

        <x-flash />
    </div>
</body>

</html>
