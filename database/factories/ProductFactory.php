<?php

namespace Database\Factories;

use App\Models\User;
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
    public function definition()
    {
        return [
            'product_name' => fake()->sentence(3),
            'product_quantity' => fake()->numberBetween(10, 100),
            'product_price' => fake()->randomFloat(2, 10, 1000),
            'product_image' => fake()->imageUrl(),
            'product_description' => fake()->paragraph(),
            'product_status' => fake()->randomElement(['featured', 'not featured']),
            'product_type' => fake()->randomElement(['vinyl', 'glossy', 'plastic', 'paper']),
            'user_id' => User::factory(),
        ];
    }
}
