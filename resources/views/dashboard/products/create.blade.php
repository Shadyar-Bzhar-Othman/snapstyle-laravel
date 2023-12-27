<x-layouts.dashboard>
    <x-form.form heading="Add Product" action="{{ route('dashboard.products.store') }}" method="POST"
        enctype="multipart/form-data">
        <x-form.input name="name" />
        <x-form.textfield name="description" />
        <x-form.input name="image" type="file" />
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
                {{-- Input added dynamicly --}}
            </div>
            <x-form.error name='quantities' />
        </div>

        <x-form.input name="price" type="number" />


        <x-form.button class="self-center mt-2">Add Product</x-form.button>
    </x-form.form>
    <script>
        function validateInput(input) {
            const minValue = 1;

            // Check if the input value is not a number or is less than the minimum value
            if (isNaN(input.value) || input.value < minValue) {
                // Set the input value to the minimum value
                input.value = minValue;
            }
        }

        function addSizeEntry(name) {
            // Check if an input with the specified name already exists
            const existingDiv = document.getElementById(`number${name}`);

            console.log(existingDiv);

            // If it exists, remove it
            if (existingDiv) {
                existingDiv.parentNode.removeChild(existingDiv);

                return;
            }

            // Add the new input
            const sizeContainer = document.querySelector("#size-container");
            const sizeEntryHTML = `
    <x-form.special-input name="${name}" field="quantities" />
`;

            sizeContainer.innerHTML += sizeEntryHTML;
        }
    </script>
</x-layouts.dashboard>
