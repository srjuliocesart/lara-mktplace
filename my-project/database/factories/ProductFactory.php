<?php

namespace Database\Factories;

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
            'name' => fake()->name(),
            'body' => fake()->paragraph(5),
            'price' => fake()->randomFloat(2, 1, 10),
            'description' => fake()->sentence(),
            'slug' => fake()->slug()
        ];
    }
}
