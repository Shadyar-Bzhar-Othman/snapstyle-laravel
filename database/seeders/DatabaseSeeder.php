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

        // User
        User::factory()->create([
            'name' => "Shadyar",
            'email' => "shadyar@gmail.com",
            'password' => "11111111",
            'role' => "1",
        ]);
        User::factory()->create([
            'name' => "Test",
            'email' => "test@gmail.com",
            'password' => "11111111",
        ]);

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

        Product::factory(10)->create();

        // Product Size
        ProductSize::factory(2)->create([
            'product_id' => '1',
        ]);

        ProductSize::factory(4)->create([
            'product_id' => '2',
        ]);

        ProductSize::factory(3)->create([
            'product_id' => '3',
        ]);

        ProductSize::factory(1)->create([
            'product_id' => '4',
        ]);

        ProductSize::factory(3)->create([
            'product_id' => '5',
        ]);

        ProductSize::factory(4)->create([
            'product_id' => '6',
        ]);

        ProductSize::factory(3)->create([
            'product_id' => '7',
        ]);

        ProductSize::factory(3)->create([
            'product_id' => '8',
        ]);

        ProductSize::factory(2)->create([
            'product_id' => '9',
        ]);

        ProductSize::factory(5)->create([
            'product_id' => '10',
        ]);
    }
}
