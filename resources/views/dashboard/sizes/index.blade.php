<x-layouts.dashboard>
    <x-structure heading="size" model="sizes">
        <thead class="bg-gray-50 border-b-2 border-gray-200">
            <tr>
                <th class="w-20 p-3 text-sm font-semibold tracking-wide text-center">Name</th>
                <th class="p-3 text-sm font-semibold tracking-wide text-center">Created Date</th>
                <th class="w-24 p-3 text-sm font-semibold tracking-wide text-center">Updated Date</th>
                <th class="w-24 p-3 text-sm font-semibold tracking-wide text-center">Action</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @foreach ($sizes as $size)
                <tr class="bg-white">
                    <td class="p-3 text-sm text-gray-700 whitespace-nowrap text-center">
                        {{ $size->name }}
                    </td>
                    <td class="p-3 text-sm text-gray-700 whitespace-nowrap text-center">
                        {{ $size->created_at->format('Y-m-d H:i:s') }}</td>
                    <td class="p-3 text-sm text-gray-700 whitespace-nowrap text-center">
                        {{ $size->updated_at->format('Y-m-d H:i:s') }}</td>
                    <td
                        class="flex justify-center items-center space-x-2 p-3 text-sm text-gray-700 whitespace-nowrap text-center">
                        <a href="{{ route('dashboard.sizes.edit', ['size' => $size]) }}"><i
                                class="fa-solid fa-pen-to-square fa-lg"></i></a>

                        <form action="{{ route('dashboard.sizes.delete', ['size' => $size]) }}" method="POST">
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
