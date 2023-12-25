<x-layouts.dashboard>
    @if (count($sizes))
        <x-form.form heading="Add Product Size" action="{{ route('dashboard.productsizes.store') }}" method="POST">
            <x-form.input name="product name" value="{{ $product->name }}" disable="true" />

            <x-form.field>
                <x-form.label name="size" />
                <select name="size" id="size"
                    class="px-4 py-2 outline-none text-sm border border-gray-400 w-full rounded-xl">
                    @foreach ($sizes as $size)
                        <option value="{{ $size->id }}">{{ $size->name }}</option>
                    @endforeach
                </select>
                <x-form.error name="size" />
            </x-form.field>

            <x-form.input name="quantity" type="number" />

            <input type="hidden" name="product_id" value="{{ $product->id }}">

            <x-form.button class="self-center mt-2">Add Product Size</x-form.button>
        </x-form.form>
    @else
        <p class="text-center">You can't add more size because you added all sizes for ({{ $product->name }}) product!
        </p>
    @endif
</x-layouts.dashboard>
