<x-layouts.dashboard>
    @if (count($sizes))
        <x-form.form heading="Update Product Size"
            action="{{ route('dashboard.productsizes.update', ['productsize' => $productsize]) }}" method="POST"
            type="PATCH">

            <x-form.field>
                <x-form.label name="size" />
                <select name="size" id="size"
                    class="px-4 py-2 outline-none text-sm border border-gray-400 w-full rounded-xl">
                    @foreach ($sizes as $size)
                        <option value="{{ $size->id }}" @if ($size->id === $productsize->size_id) selected @endif>
                            {{ $size->name }}</option>
                    @endforeach
                </select>
                <x-form.error name="size" />
            </x-form.field>

            <x-form.input name="quantity" type="number" :value="$productsize->quantity" />

            <x-form.button class="self-center mt-2">Update Product Size</x-form.button>
        </x-form.form>
    @else
        <p class="text-center">You can't update this size because you have all sizes for
            ({{ $productsize->product->name }}) product!
        </p>
    @endif
</x-layouts.dashboard>
