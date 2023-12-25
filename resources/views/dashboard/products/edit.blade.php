<x-layouts.dashboard>
    <x-form.form heading="Update Product" action="{{ route('dashboard.products.update', ['product' => $product]) }}"
        method="POST" type="PATCH">
        <x-form.input name="name" :value="$product->name" />
        <x-form.textfield name="description" :value="$product->description" />
        <x-form.field>
            <x-form.label name="category" />
            <select name="category" id="category"
                class="px-4 py-2 outline-none text-sm border border-gray-400 w-full rounded-xl">
                @foreach ($subcategories as $subcategory)
                    <option value="{{ $subcategory->id }}" @if ($subcategory->id === $product->subcategory_id) selected @endif>
                        {{ $subcategory->category->name . '-' . $subcategory->name }}</option>
                @endforeach
            </select>
            <x-form.error name="category" />
        </x-form.field>

        <x-form.input name="price" type="number" :value="$product->price" />

        <x-form.button class="self-center mt-2">Update Product</x-form.button>
    </x-form.form>

    <hr class="my-4">

    <x-structure heading="productsize" model="productsizes" :param="['product' => $product]">
        <thead class="bg-gray-50 border-b-2 border-gray-200">
            <tr>
                <th class="w-40 p-3 text-sm font-semibold tracking-wide text-center">Product Name</th>
                <th class="w-40 p-3 text-sm font-semibold tracking-wide text-center">Size</th>
                <th class="w-20 p-3 text-sm font-semibold tracking-wide text-center">Quantity</th>
                <th class="p-3 text-sm font-semibold tracking-wide text-center">Created Date</th>
                <th class="w-24 p-3 text-sm font-semibold tracking-wide text-center">Updated Date</th>
                <th class="w-24 p-3 text-sm font-semibold tracking-wide text-center">Action</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @foreach ($productsizes as $productsize)
                <tr class="bg-white">
                    <td class="p-3 text-sm text-gray-700 whitespace-nowrap  text-center">
                        {{ $productsize->product->name }}
                    </td>
                    <td class="p-3 text-sm text-gray-700 whitespace-nowrap text-center">
                        {{ $productsize->size->name }}
                    </td>
                    <td class="p-3 text-sm text-gray-700 whitespace-nowrap text-center">
                        {{ $productsize->quantity }}
                    </td>
                    <td class="p-3 text-sm text-gray-700 whitespace-nowrap text-center">
                        {{ $productsize->created_at->format('Y-m-d H:i:s') }}</td>
                    <td class="p-3 text-sm text-gray-700 whitespace-nowrap text-center">
                        {{ $productsize->updated_at->format('Y-m-d H:i:s') }}</td>
                    <td
                        class="flex justify-center items-center space-x-2 p-3 text-sm text-gray-700 whitespace-nowrap text-center">
                        <a href="{{ route('dashboard.productsizes.edit', ['productsize' => $productsize]) }}"><i
                                class="fa-solid fa-pen-to-square fa-lg"></i></a>

                        <form action="{{ route('dashboard.productsizes.delete', ['productsize' => $productsize]) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')

                            <button class="text-red-600"><i class="fa-solid fa-trash-can fa-lg"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </x-structure>
</x-layouts.dashboard>
