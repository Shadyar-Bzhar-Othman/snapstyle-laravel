<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\SubCategory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $category = $this->faker->numberBetween(1, 2);
        $subCategory = $category === 1 ? $this->faker->numberBetween(1, 5) : $this->faker->numberBetween(6, 10);

        return [
            'category_id' => $category,
            'subcategory_id' => $subCategory,
            'name' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'price' => $this->faker->numberBetween(3, 300),
        ];
    }
}
