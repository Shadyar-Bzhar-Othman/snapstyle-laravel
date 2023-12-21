<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductSize;
use App\Models\SubCategory;
use Illuminate\Database\Seeder;
use App\Models\Size;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // User
        User::factory()->create();

        // Sizes
        Size::factory()->create([
            'name' => 'XS',
        ]
        );
        Size::factory()->create([
            'name' => 'S',
        ]
        );
        Size::factory()->create([
            'name' => 'M',
        ]
        );
        Size::factory()->create([
            'name' => 'L',
        ]
        );
        Size::factory()->create([
            'name' => 'XL',
        ]
        );


        // Man Category
        Category::factory()->create([
            'name' => 'Man',
        ]
        );

        // Woman Category
        Category::factory()->create([
            'name' => 'Woman',
        ]
        );


        // For Men
        SubCategory::factory()->create([
            'category_id' => '1',
            'name' => 'T-Shirts',
        ]);

        SubCategory::factory()->create([
            'category_id' => '1',
            'name' => 'Jeans',
        ]);

        SubCategory::factory()->create([
            'category_id' => '1',
            'name' => 'Hoodies',
        ]);

        SubCategory::factory()->create([
            'category_id' => '1',
            'name' => 'Formal Shirts',
        ]);

        SubCategory::factory()->create([
            'category_id' => '1',
            'name' => 'Sneakers',
        ]);

        // For Women
        SubCategory::factory()->create([
            'category_id' => '2',
            'name' => 'Dresses',
        ]);

        SubCategory::factory()->create([
            'category_id' => '2',
            'name' => 'Blouses',
        ]);

        SubCategory::factory()->create([
            'category_id' => '2',
            'name' => 'Skirts',
        ]);

        SubCategory::factory()->create([
            'category_id' => '2',
            'name' => 'High Heels',
        ]);

        SubCategory::factory()->create([
            'category_id' => '2',
            'name' => 'Handbags',
        ]);

        Product::factory(2)->create([
            'category_id' => '1',
            'subcategory_id' => '2',
        ]);

        Product::factory(2)->create([
            'category_id' => '2',
            'subcategory_id' => '7',
        ]);


        // Product Size
        ProductSize::factory()->create([
            'product_id' => '1',
            'size_id' => '1',
        ]);

        ProductSize::factory()->create([
            'product_id' => '1',
            'size_id' => '2',
        ]);

        ProductSize::factory()->create([
            'product_id' => '2',
            'size_id' => '3',
        ]);

        ProductSize::factory()->create([
            'product_id' => '2',
            'size_id' => '4',
        ]);

        ProductSize::factory()->create([
            'product_id' => '2',
            'size_id' => '5',
        ]);

        ProductSize::factory()->create([
            'product_id' => '2',
            'size_id' => '1',
        ]);

        ProductSize::factory()->create([
            'product_id' => '3',
            'size_id' => '1',
        ]);

        ProductSize::factory()->create([
            'product_id' => '3',
            'size_id' => '4',
        ]);

        ProductSize::factory()->create([
            'product_id' => '4',
            'size_id' => '2',
        ]);

        ProductSize::factory()->create([
            'product_id' => '4',
            'size_id' => '1',
        ]);
    }
}
