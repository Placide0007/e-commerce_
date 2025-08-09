<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = [
            'Cartes graphiques',
            'Processeurs (CPU)',
            'Mémoire vive (RAM)',
            'Stockage SSD',
            'Stockage HDD',
            'Cartes mères',
            'Boîtiers PC',
            'Alimentations (PSU)',
            'Refroidissement (ventilateurs & watercooling)',
            'Périphériques (clavier, souris)',
            'Écrans',
            'Accessoires divers'
        ];

        return [
            'category_name' => $this->faker->unique()->randomElement($categories),
        ];
    }
}
