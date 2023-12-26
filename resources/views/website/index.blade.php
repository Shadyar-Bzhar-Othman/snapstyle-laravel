<x-layouts.main pd="false">
    <div>
        <div
            class="flex-col sm:flex-row flex justify-center sm:justify-between items-start sm:items-center sm:space-x-16">
            <div>
                <img src="{{ asset('images/23.png') }}" alt="img" width="200px">
            </div>
            <h1 class="self-center text-4xl sm:text-6xl font-bold text-center">ORGINALITY YOU WEAR EVERYDAY</h1>
            <div class="hidden sm:flex">
                <img src="{{ asset('images/25.png') }}" alt="img">
            </div>
        </div>
        <div class="flex justify-center items-center">
            <a href="{{ route('products.index') }}" class="my-2"><x-form.button class="text-1xl sm:text-3xl">Shop
                    Now</x-form.button></a>
        </div>
        <div
            class="flex-col sm:flex-row flex justify-center sm:justify-between items-start sm:items-end space-y-4 sm:space-y-0">
            <div>
                <img src="{{ asset('images/1.png') }}" alt="img">
            </div>
            <h1 class="self-center text-2xl sm:text-5xl font-bold text-center border border-black rounded-full p-12">
                SITEWIDE SALE
            </h1>
            <div class="self-center">
                <img src="{{ asset('images/9.png') }}" alt="img" width="250px">
            </div>
        </div>
    </div>
    <div class="bg-slate-100 py-2 px-4">
        <h1 class="text-3xl font-bold mb-2">Populer Products</h1>
        <div class="flex justify-start items-center gap-4 flex-wrap w-full">
            @foreach ($products as $product)
                <x-cards.product :product="$product" />
            @endforeach
        </div>
    </div>
    <div class="flex-col sm:flex-col flex justify-between items-center p-2 space-y-2">
        <div>
            <h1 class="text-4xl font-bold mb-2">Lorem ipsum dolor sit amet.</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur, ducimus dolore qui obcaecati et porro
                beatae, eligendi quibusdam necessitatibus sapiente dolor unde atque nisi. Est ipsa sequi nam pariatur
                similique!
            </p>
        </div>
        <div>
            <img src="{{ asset('images/8.png') }}" alt="img">
        </div>
    </div>
</x-layouts.main>
