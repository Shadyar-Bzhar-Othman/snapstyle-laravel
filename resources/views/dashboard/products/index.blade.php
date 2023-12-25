<x-layouts.dashboard>
    <x-structure heading="product" model="products">
        <thead class="bg-gray-50 border-b-2 border-gray-200">
            <tr>
                <th class="w-40 p-3 text-sm font-semibold tracking-wide text-center">Name</th>
                <th class="w-40 p-3 text-sm font-semibold tracking-wide text-center">Description</th>
                <th class="w-20 p-3 text-sm font-semibold tracking-wide text-center">Category</th>
                <th class="w-20 p-3 text-sm font-semibold tracking-wide text-center">Sub Category</th>
                <th class="w-20 p-3 text-sm font-semibold tracking-wide text-center">Price</th>
                <th class="p-3 text-sm font-semibold tracking-wide text-center">Created Date</th>
                <th class="w-24 p-3 text-sm font-semibold tracking-wide text-center">Updated Date</th>
                <th class="w-24 p-3 text-sm font-semibold tracking-wide text-center">Action</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @foreach ($products as $product)
                <tr class="bg-white">
                    <td class="p-3 text-sm text-gray-700 whitespace-nowrap  text-center">
                        {{ $product->name }}
                    </td>
                    <td class="p-3 text-sm text-gray-700 whitespace-nowrap text-center">
                        {{ $product->description }}
                    </td>
                    <td class="p-3 text-sm text-gray-700 whitespace-nowrap text-center">
                        {{ $product->category->name }}
                    </td>
                    <td class="p-3 text-sm text-gray-700 whitespace-nowrap text-center">
                        {{ $product->subcategory->name }}
                    </td>
                    <td class="p-3 text-sm text-gray-700 whitespace-nowrap text-center">
                        {{ $product->price }}
                    </td>
                    <td class="p-3 text-sm text-gray-700 whitespace-nowrap text-center">
                        {{ $product->created_at->format('Y-m-d H:i:s') }}</td>
                    <td class="p-3 text-sm text-gray-700 whitespace-nowrap text-center">
                        {{ $product->updated_at->format('Y-m-d H:i:s') }}</td>
                    <td
                        class="flex justify-center items-center space-x-2 p-3 text-sm text-gray-700 whitespace-nowrap text-center">
                        <a href="{{ route('dashboard.products.edit', ['product' => $product]) }}"><i
                                class="fa-solid fa-pen-to-square fa-lg"></i></a>

                        <form action="{{ route('dashboard.products.delete', ['product' => $product]) }}" method="POST">
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
