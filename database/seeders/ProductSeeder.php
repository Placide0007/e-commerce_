<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $categories = Category::all();

        $images = [
            'product-1.jpg',
            'product-2.jpg',
            'product-3.jpg',
            'product-4.jpg',
            'product-5.jpg',
            'product-6.jpg',
            'product-7.jpg',
            'product-8.jpg',
            'product-9.jpg',
            'product-10.jpg',
            'product-11.jpg',
            'product-12.jpg',
        ];

        foreach (range(1, 10) as $i) {

            $name = fake()->words(3, true);

            Product::create([
                'name' => $name,
                'slug' => Str::slug($name . '-' . $i),
                'description' => fake()->paragraph(),
                'price' => fake()->randomFloat(2, 500, 100000),
                'stock' => fake()->numberBetween(0, 500),
                'image' => fake()->randomElement($images),
                'category_id' => $categories->random()->id,
            ]);
        }
    }
}

