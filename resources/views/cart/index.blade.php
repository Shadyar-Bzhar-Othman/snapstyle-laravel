<x-layouts.main>

    @if (count($items) !== 0)
        <div class="flex-col sm:flex-row flex justify-between items-center sm:items-start space-x-4">
            <div class="w-full shadow rounded-lg p-2">
                <table class="w-full text-sm">
                    <thead class="text-sm sm:text-lg text-slate-300 uppercase bg-gray-50 rounded">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Product
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Price
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr class="bg-white border-b ">
                                <td class="flex items-center w-auto space-x-2 text-center px-6 py-4">
                                    <div class="">
                                        <img src="{{ asset('images/product-img/1.png') }}" alt="product-img"
                                            width="100px" height="100px" class="object-cover rounded-lg">
                                    </div>
                                    <div class="flex flex-col space-y-2 items-start">
                                        <span class="text-sm sm:text-lg">{{ $item->product->name }}</span>
                                        <span class="text-sm text-slate-300">{{ $item->size->name }}</span>
                                    </div>
                                </td>
                                <td class="text-center px-6 py-4">
                                    <span>{{ $item->product->price }}</span>
                                </td>
                                <td class="space-y-2 text-center px-6 py-4">
                                    <div
                                        class="flex justify-center items-center space-x-2 border border-primaryColor p-1 rounded">
                                        <form action="{{ route('cart.update', ['cartitem' => $item]) }}" method="post">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="action" value="sub">
                                            <x-form.button>-</x-form.button>
                                        </form>
                                        <span class="text-sm text-slate-300">{{ $item->quantity }}</span>
                                        <form action="{{ route('cart.update', ['cartitem' => $item]) }}" method="post">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="action" value="add">
                                            <x-form.button>+</x-form.button>
                                        </form>
                                    </div>
                                    <form action="{{ route('cart.delete', ['cartitem' => $item]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <x-form.button>Delete</x-form.button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="text-white">
                Space
            </div>
            <div class="w-auto shadow-md rounded-lg p-4 flex flex-col justify-center">
                <div class="flex justify-between items-center space-x-16 mb-2">
                    <h1 class="text-lg text-slate-300">Subtotal</h1>
                    <span class="text-sm">${{ $totalPrice }}</span>
                </div>
                <div class="flex justify-between items-center space-x-16 mb-2">
                    <h1 class="text-sm text-slate-300">Shipping Cost</h1>
                    <span class="text-sm">$12</span>
                </div>
                <hr>
                <div class="flex justify-between items-center space-x-16 mt-2">
                    <h1 class="text-lg text-slate-300">Subtotal</h1>
                    <span class="text-sm">${{ $totalPrice + 12 }}</span>
                </div>
                <form action="{{ route('orders.store') }}" method="POST" class="self-center">
                    @csrf

                    <input type="hidden" name="items" value="{{ $items }}">
                    <input type="hidden" name="total_price" value="{{ $totalPrice + 12 }}">
                    <x-form.button class="mt-2">Order</x-form.button>
                </form>
            </div>
        </div>
    @else
        <p class="self-center text-center">
            Your cart is currently empty. Explore our <a href="{{ route('products.index') }}"
                class="text-primaryColor font-bold">products</a> and start adding items!
        </p>
    @endif
</x-layouts.main>
