<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use App\Models\Size;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductSize>
 */
class ProductSizeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => Product::factory()->create(),
            'size_id' => Size::factory()->create(),
            'quantity' => $this->faker->numberBetween(3, 20),
        ];
    }
}
