@props(['product'])

<form action="/" method="GET" class="shadow border rounded-xl bg-white w-full h-50 sm:w-72">
    <div class="h-64 sm:h-52">
        <img src="{{ asset('images/product-img/1.png') }}" alt="product-img" class="object-cover w-full h-full rounded-lg">
    </div>
    <div class="p-4">
        <div class="mb-1">
            <span class="text-sm">{{ $product->category->name }} - {{ $product->subcategory->name }}</span>
        </div>
        <h1 class="font-bold text-sm md:text-lg">{{ $product->name }}</h1>
        <span class="text-sm">${{ $product->price }}</span>
        <div class="flex flex-wrap justify-start items-center space-x-2 mb-2">
            @foreach ($product->productsizes as $productsize)
                <div class="border border-primaryColor rounded px-1 mb-1">
                    <input type="radio" id="size_{{ $product->id }}_{{ $productsize->size->id }}"
                        name="size_{{ $product->id }}" value="{{ $productsize->size->id }}">
                    <label class="text-xs text-primaryColor"
                        for="size_{{ $product->id }}_{{ $productsize->size->id }}">{{ $productsize->size->name }}</label>
                </div>
            @endforeach
        </div>
        <div class="flex justify-between items-center">
            <input type="hidden" name="quantity" value="1">
            <x-form.button>Add to Cart</x-form.button>
            <i class="fa-regular fa-heart"></i>
        </div>
    </div>
</form>
