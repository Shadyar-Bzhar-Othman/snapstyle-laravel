<x-layouts.main pd="false">
    <div>
        <div
            class="flex-col sm:flex-row flex justify-center sm:justify-between items-start sm:items-center sm:space-x-16">
            <div>
                <img src="{{ asset('images/23.png') }}" alt="img" width="200px">
            </div>
            <h1 class="self-center text-4xl sm:text-6xl font-bold text-center">ORGINALITY YOU WEAR EVERYDAY</h1>
            <div class="hidden sm:flex mr-4">
                <img src="{{ asset('images/25.png') }}" alt="img">
            </div>
        </div>
        <div class="flex justify-center items-center">
            <a href="{{ route('products.index') }}" class="my-4"><x-form.button class="text-1xl sm:text-3xl">Shop
                    Now</x-form.button></a>
        </div>
        <div
            class="flex-col sm:flex-row flex justify-center sm:justify-between items-center space-y-4 sm:space-y-0 px-4">
            <div class="mb-2">
                <img src="{{ asset('images/1.png') }}" alt="img">
            </div>
            <h1
                class="self-center text-2xl sm:text-5xl font-bold text-center border border-blackColor rounded-full p-12">
                SITEWIDE SALE
            </h1>
            <div class="self-center">
                <img src="{{ asset('images/9.png') }}" alt="img">
            </div>
        </div>
    </div>
    <div class="bg-gray-50 py-2 px-4">
        <h1 class="text-3xl font-bold text-primaryColor mb-2">Populer Products</h1>
        <div class="flex justify-start items-start gap-4 flex-wrap w-full">
            @foreach ($products as $product)
                <x-cards.product :product="$product" link="false" />
            @endforeach
        </div>
    </div>
    <div class="flex-col sm:flex-row flex justify-between items-center p-4 space-y-6">
        <div class="w-auto">
            <h1 class="text-3xl font-bold text-primaryColor mb-2">WHERE PERSONALITY MEETS FABRIC</h1>
            <p class="whitespace-pre-line">
                Personal style in fashion is more than just what you wear—it's a visual manifestation of your
                personality. It's the art of curating outfits that resonate with your inner essence
            </p>
        </div>
        <div>
            <img src="{{ asset('images/8.png') }}" alt="img">
        </div>
    </div>
    <div class="flex flex-col justify-center items-center bg-gray-50 py-2 px-4">
        <h1 class="text-3xl font-bold text-primaryColor mb-4">FOLLOW US</h1>
        <div class="flex justify-center items-center gap-4 flex-wrap w-full">
            @for ($i = 3; $i < 8; $i++)
                <img src="{{ asset('images/' . $i . '.png') }}" alt="img">
            @endfor
        </div>
    </div>
</x-layouts.main>
