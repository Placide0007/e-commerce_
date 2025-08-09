<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            'product_name' => $this->faker->words(2, true),
            'product_price' => $this->faker->randomFloat(2, 49.99, 1999.99),
            'product_description' => $this->faker->paragraph,
            'product_stock' => $this->faker->randomElement([400, 600, 700]),
            'category_id' => Category::inRandomOrder()->first()?->id ?? Category::factory(),
            'product_image' => $this->faker->randomElement([
                '1.jpg',
                '2.jpg',
                '3.jpg',
                '4.jpg',
                '5.jpg',
                '6.jpg',
            ]),

            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
