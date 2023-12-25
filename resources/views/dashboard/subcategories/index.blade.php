<x-layouts.dashboard>
    <x-structure heading="subcategory" model="subcategories">
        <thead class="bg-gray-50 border-b-2 border-gray-200">
            <tr>
                <th class="w-20 p-3 text-sm font-semibold tracking-wide text-center">Name</th>
                <th class="w-20 p-3 text-sm font-semibold tracking-wide text-center">Category</th>
                <th class="p-3 text-sm font-semibold tracking-wide text-center">Created Date</th>
                <th class="w-24 p-3 text-sm font-semibold tracking-wide text-center">Updated Date</th>
                <th class="w-24 p-3 text-sm font-semibold tracking-wide text-center">Action</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @foreach ($subcategories as $subcategory)
                <tr class="bg-white">
                    <td class="p-3 text-sm text-gray-700 whitespace-nowrap text-center">
                        {{ $subcategory->name }}
                    </td>
                    <td class="p-3 text-sm text-gray-700 whitespace-nowrap text-center">
                        {{ $subcategory->category->name }}
                    </td>
                    <td class="p-3 text-sm text-gray-700 whitespace-nowrap text-center">
                        {{ $subcategory->created_at->format('Y-m-d H:i:s') }}</td>
                    <td class="p-3 text-sm text-gray-700 whitespace-nowrap text-center">
                        {{ $subcategory->updated_at->format('Y-m-d H:i:s') }}</td>
                    <td
                        class="flex justify-center items-center space-x-2 p-3 text-sm text-gray-700 whitespace-nowrap text-center">
                        <a href="{{ route('dashboard.subcategories.edit', ['subcategory' => $subcategory]) }}"><i
                                class="fa-solid fa-pen-to-square fa-lg"></i></a>

                        <form action="{{ route('dashboard.subcategories.delete', ['subcategory' => $subcategory]) }}"
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
