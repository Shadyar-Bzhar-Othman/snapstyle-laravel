<x-layouts.dashboard>
    <h1 class="text-center text-2xl font-bold text-primaryColor">Order Datails</h1>
    <div class="flex-col sm:flex-row flex justify-between items-center p-10 space-x-2 space-y-2">
        <div>
            <div class="flex justify-start items-center space-x-2 mb-2">
                <h5 class="mb-2 text-sm font-bold">Order Number: </h5>
                <h1 class="mb-2 text-xs font-bold text-darkgreyColor">{{ $order->id }}</h1>
            </div>
            <div class="flex justify-start items-center space-x-2 mb-2">
                <h5 class="mb-2 text-sm font-bold">Order State: </h5>
                <h1 class="mb-2 text-xs font-bold text-darkgreyColor">{{ $order->state->name }}</h1>
            </div>
            <div class="flex justify-start items-center space-x-2 mb-2">
                <h5 class="mb-2 text-sm font-bold">User (Username): </h5>
                <h1 class="mb-2 text-xs font-bold text-darkgreyColor">{{ $order->user->name }}</h1>
            </div>
            <div class="flex justify-start items-center space-x-2 mb-2">
                <h5 class="mb-2 text-sm font-bold">Total Order Price: </h5>
                <h1 class="mb-2 text-xs font-bold text-darkgreyColor">${{ $order->total_price }}</h1>
            </div>
        </div>
        <form action="{{ route('dashboard.orders.update', ['order' => $order]) }}" method="POST">
            @csrf
            @method('PATCH')

            <x-form.field>
                <x-form.label name="state" />
                <select name="state" id="state"
                    class="px-4 py-2 outline-none text-sm border border-gray-400 w-full rounded-xl">
                    @foreach ($states as $state)
                        <option value="{{ $state->id }}" @if ($state->id == $order->state_id) selected @endif>
                            {{ $state->name }}
                        </option>
                    @endforeach
                </select>

                <x-form.button class="self-center mt-2">Update</x-form.button>
            </x-form.field>
        </form>
    </div>
    <div class="overflow-auto rounded-lg shadow mt-4">
        <table class="w-full">
            <thead class="bg-gray-50 border-b-2 border-gray-200">
                <tr>
                    <th class="w-20 p-3 text-sm font-semibold tracking-wide text-center">Order Number</th>
                    <th class="w-20 p-3 text-sm font-semibold tracking-wide text-center">Product</th>
                    <th class="p-3 text-sm font-semibold tracking-wide text-center">Size</th>
                    <th class="p-3 text-sm font-semibold tracking-wide text-center">Quantity</th>
                    <th class="p-3 text-sm font-semibold tracking-wide text-center">Price</th>
                    <th class="w-24 p-3 text-sm font-semibold tracking-wide text-center">Created Date</th>
                    <th class="w-24 p-3 text-sm font-semibold tracking-wide text-center">Updated Date</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach ($orderitems as $orderitem)
                    <tr class="bg-white">
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap text-center">
                            {{ $orderitem->order_id }}
                        </td>
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap text-center">
                            {{ $orderitem->product->name }}
                        </td>
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap text-center">
                            {{ $orderitem->size->name }}
                        </td>
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap text-center">
                            {{ $orderitem->quantity }}
                        </td>
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap text-center">
                            {{ $orderitem->price }}
                        </td>
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap text-center">
                            {{ $orderitem->created_at->format('Y-m-d H:i:s') }}</td>
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap text-center">
                            {{ $orderitem->updated_at->format('Y-m-d H:i:s') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layouts.dashboard>
