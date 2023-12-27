<x-layouts.main>
    <div class="flex-col sm:flex-row flex justify-between items-start space-x-2">
        <div class="w-full sm:w-auto mb-6 rounded shadow-md p-3">
            <form action="{{ route('products.index') }}" method="GET">

                <div class="bg-primaryColor bg-opacity-20 flex justify-between items-center p-2 rounded space-x-16">
                    <h1>Categories</h1>
                </div>


                @foreach ($categories as $category)
                    <div x-data="{ open: false }">
                        <div class ="flex justify-between items-center ml-3 mt-1 p-2 space-x-16" @click="open = !open">
                            <h1>{{ $category->name }}</h1>
                            <i class="fa-solid" x-bind:class="{ 'fa-angle-down': open, 'fa-angle-right': !open }"></i>
                        </div>

                        <div x-show="open" x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 transform scale-95"
                            x-transition:enter-end="opacity-100 transform scale-100"
                            x-transition:leave="transition ease-in duration-300"
                            x-transition:leave-start="opacity-100 transform scale-100"
                            x-transition:leave-end="opacity-0 transform scale-95">
                            @foreach ($subcategories as $child)
                                @if ($child->category_id === $category->id)
                                    <div class="ml-6 mt-1 space-x-2">
                                        <input type="checkbox" name="subcategories[]" id="{{ $child->id }}"
                                            value="{{ $child->id }}">
                                        <label for="{{ $child->id }}">
                                            {{ $child->name }} ({{ $child->products_count }})
                                        </label>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endforeach

                <x-form.button class="w-full mt-2">Filter</x-form.button>
            </form>
        </div>

        <div class="w-full rounded p-2">
            <div class="mb-8 flex flex-col gap-4 items-center sm:items-start justify-center sm:flex-row flex-wrap">
                @if (count($products))
                    @foreach ($products as $product)
                        <x-cards.product :product="$product" />
                    @endforeach
                @else
                    <p class="text-xg font-bold text-center">No products available at the moment</p>
                @endif
            </div>
            <div class="mt-6">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</x-layouts.main>
