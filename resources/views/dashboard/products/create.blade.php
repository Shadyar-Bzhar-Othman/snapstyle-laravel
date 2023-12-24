<x-layouts.dashboard>
    <x-form.form heading="Add Product" action="{{ route('dashboard.products.store') }}" method="POST">
        <x-form.input name="name" />
        <x-form.textfield name="description" />
        <x-form.field>
            <x-form.label name="category" />
            <select name="category" id="category"
                class="px-4 py-2 outline-none text-sm border border-gray-400 w-full rounded-xl">
                @foreach ($subcategories as $subcategory)
                    <option value="{{ $subcategory->id }}">
                        {{ $subcategory->category->name . '-' . $subcategory->name }}</option>
                @endforeach
            </select>
            <x-form.error name="category" />
        </x-form.field>

        <x-form.field>
            <x-form.label name="sizes" />
            <div class="flex justify-start items-center flex-wrap gap-4">
                @foreach ($sizes as $size)
                    <x-form.checkbox name="{{ $size->name }}" field="sizes[{{ $size->name }}]"
                        value="{{ $size->id }}" />
                @endforeach
            </div>
            <x-form.error name="sizes[]" />
        </x-form.field>

        <div class="bg-slate-300 p-2 rounded w-full">
            <x-form.label name="quantities" class="font-bold" />
            <div id="size-container">
                {{-- Inputed added dynamicly --}}
            </div>
            <x-form.error name='quantities' />
        </div>

        <x-form.input name="price" type="number" />


        <x-form.button class="self-center mt-2">Add Product</x-form.button>
    </x-form.form>
</x-layouts.dashboard>
