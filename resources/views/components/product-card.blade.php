@props(['product'])

<form action="/" method="GET" class="shadow-md rounded">
    <div>
        <img src="{{ asset('images/product-img/2.png') }}" alt="product-img" width="250" height="100"
            class="object-cover rounded-t">
    </div>
    <div class="p-4">
        <h1>{{ $product['name'] }}</h1>
        <span>$ {{ $product['price'] }}</span>
        <div class="flex flex-wrap justify-start items-center space-x-2 space-y-1 mb-2">
            @foreach ($product['sizes'] as $size)
                <div class="border border-primaryColor rounded px-1 mb-1">
                    <input type="radio" id="{{ $product['id'] . $size['id'] }}" name="size.{{ $product['id'] }}"
                        value="{{ $size['id'] }}">
                    <label class="text-xs text-primaryColor"
                        for="{{ $product['id'] . $size['id'] }}">{{ $size['name'] }} </label>
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
