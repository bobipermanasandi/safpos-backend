<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'category' => fake()->randomElement(['food', 'drink', 'snack']),
            'stock' => fake()->numberBetween(1, 100),
            'price' => fake()->numberBetween(10000, 100000),
            'images' => fake()->imageUrl(),
            'description' => fake()->text()
        ];
    }
}
