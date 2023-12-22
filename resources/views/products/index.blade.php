<?php
// $categories = [
//     [
//         'id' => 1,
//         'name' => 'Man',
//     ],
//     [
//         'id' => 2,
//         'name' => 'Woman',
//     ],
//     [
//         'id' => 3,
//         'name' => 'Kids',
//     ],
// ];

// $subCategories = [
//     [
//         'id' => 1,
//         'category_id' => 1,
//         'name' => 'T-Shirt',
//     ],
//     [
//         'id' => 2,
//         'category_id' => 2,
//         'name' => 'Shirt',
//     ],
//     [
//         'id' => 1,
//         'category_id' => 2,
//         'name' => 'Jeans',
//     ],
//     [
//         'id' => 2,
//         'category_id' => 1,
//         'name' => 'Shoes',
//     ],
// ];

// $products = [
//     [
//         'id' => '1',
//         'category_id' => '1',
//         'subcategory_id' => '1',
//         'name' => 'T-shirt',
//         'description' => 'lllllllllllllllllllllllllllllllllll',
//         'sizes' => [
//             [
//                 'id' => '1',
//                 'name' => 'S',
//             ],
//             [
//                 'id' => '3',
//                 'name' => 'XL',
//             ],
//         ],
//         'price' => '12',
//     ],
//     [
//         'id' => '2',
//         'category_id' => '2',
//         'subcategory_id' => '1',
//         'name' => 'Jeans',
//         'description' => 'lllllllllllllllllllllllllllllllllll',
//         'sizes' => [
//             [
//                 'id' => '1',
//                 'name' => 'S',
//             ],
//             [
//                 'id' => '2',
//                 'name' => 'L',
//             ],
//             [
//                 'id' => '3',
//                 'name' => 'XL',
//             ],
//         ],
//         'price' => '38',
//     ],
//     [
//         'id' => '3',
//         'category_id' => '2',
//         'subcategory_id' => '1',
//         'name' => 'Jacket',
//         'description' => 'lllllllllllllllllllllllllllllllllll',
//         'sizes' => [
//             [
//                 'id' => '3',
//                 'name' => 'XL',
//             ],
//         ],
//         'price' => '14',
//     ],
//     [
//         'id' => '4',
//         'category_id' => '2',
//         'subcategory_id' => '3',
//         'name' => 'Shirt',
//         'description' => 'lllllllllllllllllllllllllllllllllll',
//         'sizes' => [
//             [
//                 'id' => '1',
//                 'name' => 'S',
//             ],
//         ],
//         'price' => '120',
//     ],
// ];
?>

<x-layout>
    <div class="flex-col sm:flex-row flex justify-between items-start space-x-2">
        <div class="w-full sm:w-auto mb-6 rounded shadow-md p-3">
            <form action="/" method="GET">

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
            <div class="mb-8 flex flex-col gap-4 items-center sm:items-start justify-center sm:flex-row  sm:flex-wrap">
                @if (count($products))
                    @foreach ($products as $product)
                        <x-product-card :product="$product" />
                    @endforeach
                @else
                    <p class="text-xg font-bold text-center">There's no products to display</p>
                @endif
            </div>
            <div class="mt-6">
                {{ $products->links() }}
            </div>
        </div>

    </div>
</x-layout>
