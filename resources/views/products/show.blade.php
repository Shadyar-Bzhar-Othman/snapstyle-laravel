<x-layouts.main>
    <div class="flex-col justify-center sm:flex-row flex sm:justify-start items-center">
        <div class="max-h-screen mb-4" style="max-width:400px;width:auto">
            <img src="{{ asset('storage/' . $product->image) }}" alt="product-img"
                class="object-cover w-full h-full rounded-lg">
        </div>
        <div class="flex flex-col justify-center items-start ml-8">
            <span
                class="text-slate-300 text-sm md:text-base">{{ $product->category->name . ' - ' . $product->subcategory->name }}</span>
            <h1 class="text-2xl sm:text-4xl">{{ $product->name }}</h1>
            <h1 class="text-primaryColor text-3xl my-4">$100</h1>
            <p>
                {{ $product->description }}
            </p>
            <form action="{{ route('cart.store') }}" method="POST">
                @csrf

                <div class="flex flex-wrap justify-start items-center space-x-2 my-4">
                    @foreach ($product->productsizes as $productsize)
                        <div class="border border-primaryColor rounded px-1 mb-1">
                            <input type="radio" id="size_{{ $product->id }}_{{ $productsize->size->id }}"
                                name="size_{{ $product->id }}" value="{{ $productsize->size->id }}"
                                @if (old('size_' . $product->id) === $productsize->size->id) selected @endif>
                            <label class="text-xs text-primaryColor"
                                for="size_{{ $product->id }}_{{ $productsize->size->id }}">{{ $productsize->size->name }}</label>
                        </div>
                    @endforeach

                    <x-form.error name="size_{{ $product->id }}" />
                </div>
                <div class="flex flex-col justify-start items-start space-y-2">
                    <input type="number" name="quantity" value="1"
                        class="px-4 py-2 outline-none text-sm border border-gray-400 w-full rounded-xl"
                        oninput="validateInput(this)">
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="flex justify-start items-center space-x-4 w-full">
                        <i class="fa-regular fa-heart"></i>
                        <x-form.button class="w-full">Add to Cart</x-form.button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        function validateInput(input) {
            const minValue = 1;

            // Check if the input value is not a number or is less than the minimum value
            if (isNaN(input.value) || input.value < minValue) {
                // Set the input value to the minimum value
                input.value = minValue;
            }
        }
    </script>
</x-layouts.main>
