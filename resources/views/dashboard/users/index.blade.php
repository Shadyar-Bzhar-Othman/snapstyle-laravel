<x-layouts.dashboard>
    <x-structure heading="user" model="users">
        <thead class="bg-gray-50 border-b-2 border-gray-200">
            <tr>
                <th class="w-20 p-3 text-sm font-semibold tracking-wide text-center">Name</th>
                <th class="w-20 p-3 text-sm font-semibold tracking-wide text-center">Email</th>
                <th class="p-3 text-sm font-semibold tracking-wide text-center">Password</th>
                <th class="p-3 text-sm font-semibold tracking-wide text-center">Role</th>
                <th class="w-24 p-3 text-sm font-semibold tracking-wide text-center">Created Date</th>
                <th class="w-24 p-3 text-sm font-semibold tracking-wide text-center">Updated Date</th>
                <th class="w-24 p-3 text-sm font-semibold tracking-wide text-center">Action</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @foreach ($users as $user)
                <tr class="bg-white">
                    <td class="p-3 text-sm text-gray-700 whitespace-nowrap text-center">
                        {{ $user->name }}
                    </td>
                    <td class="p-3 text-sm text-gray-700 whitespace-nowrap text-center">
                        {{ $user->email }}
                    </td>
                    <td class="p-3 text-sm text-gray-700 whitespace-nowrap text-center">
                        ********
                    </td>
                    <td class="p-3 text-sm text-gray-700 whitespace-nowrap text-center">
                        {{ $user->role == 1 ? 'Admin' : 'Normal User' }}
                    </td>
                    <td class="p-3 text-sm text-gray-700 whitespace-nowrap text-center">
                        {{ $user->created_at->format('Y-m-d H:i:s') }}</td>
                    <td class="p-3 text-sm text-gray-700 whitespace-nowrap text-center">
                        {{ $user->updated_at->format('Y-m-d H:i:s') }}</td>
                    <td
                        class="flex justify-center items-center space-x-2 p-3 text-sm text-gray-700 whitespace-nowrap text-center">
                        <a href="{{ route('dashboard.users.edit', ['user' => $user]) }}"><i
                                class="fa-solid fa-pen-to-square fa-lg"></i></a>

                        <form action="{{ route('dashboard.users.delete', ['user' => $user]) }}" method="POST">
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
