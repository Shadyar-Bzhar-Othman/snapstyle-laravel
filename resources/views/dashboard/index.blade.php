<x-dashboard-layout>
    <div class="flex h-screen bg-gray-100">
        <nav class="w-auto sm:w-64 shadow text-white p-3 rounded-tr-xl rounded-br-xl">
            <h1 class="text-2xl text-primaryColor font-bold mb-2"><a href="/">SnapStyle</a></h1>
            <ul class="space-y-2 w-full">
                <li
                    class="transition-all duration-500 ease-in-out p-1 w-full rounded text-black hover:bg-primaryColor hover:text-white">
                    <a href="/" class="text-base text-inherit">
                        Dashboard
                    </a>
                </li>
                <li
                    class="transition-all duration-500 ease-in-out p-1 w-full rounded text-black hover:bg-primaryColor hover:text-white">
                    <a href="/dashboard/users" class="text-base text-inherit">
                        Users
                    </a>
                </li>
                <li
                    class="transition-all duration-500 ease-in-out p-1 w-full rounded text-black hover:bg-primaryColor hover:text-white">
                    <a href="/dashboard/products" class="text-base text-inherit">
                        Products
                    </a>
                </li>
                <li
                    class="transition-all duration-500 ease-in-out p-1 w-full rounded text-black hover:bg-primaryColor hover:text-white">
                    <a href="/dashboard/category" class="text-base text-inherit">
                        Category
                    </a>
                </li>
                <li
                    class="transition-all duration-500 ease-in-out p-1 w-full rounded text-black hover:bg-primaryColor hover:text-white">
                    <a href="/dashboard/subcategory" class="text-base text-inherit">
                        Sub Category
                    </a>
                </li>
                <li
                    class="transition-all duration-500 ease-in-out p-1 w-full rounded text-black hover:bg-primaryColor hover:text-white">
                    <a href="/dashboard/orders" class="text-base text-inherit">
                        Orders
                    </a>
                </li>
            </ul>
        </nav>

        <div class="flex-1 p-8">
            <x-form.form heading="Add Product" action="/dashboard/products/create" method="POST">
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

            {{-- <x-form.form heading="Add User" action="/register" method="POST">
                <x-form.input name="name" />
                <x-form.input name="email" type="email" />
                <x-form.input name="password" type="password" />
                <x-form.field>
                    <x-form.label name="type" />
                    <select name="type" id="type"
                        class="px-4 py-2 outline-none text-sm border border-gray-400 w-full rounded-xl">
                        <option value="1">Admin</option>
                        <option value="0">Normal User</option>
                    </select>
                    <x-form.error name="type" />
                </x-form.field>

                <x-form.button class="self-center mt-2">Add User</x-form.button>
            </x-form.form>

            <x-form.form heading="Add Category" action="/register" method="POST">
                <x-form.input name="category" />

                <x-form.button class="self-center mt-2">Add Category</x-form.button>
            </x-form.form>

            <x-form.form heading="Add Sub Category" action="/register" method="POST">
                <x-form.input name="subcategory" />
                <x-form.field>
                    <x-form.label name="category" />
                    <select name="category" id="category"
                        class="px-4 py-2 outline-none text-sm border border-gray-400 w-full rounded-xl">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <x-form.error name="category" />
                </x-form.field>

                <x-form.button class="self-center mt-2">Add Sub Category</x-form.button>
            </x-form.form> --}}
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
            const sizeContainer = document.querySelector('#size-container');
            const sizeEntryHTML = `
            <x-form.special-input name="${name}" field="quantities" />
        `;

            sizeContainer.innerHTML += sizeEntryHTML;
        }
    </script>
</x-dashboard-layout>
