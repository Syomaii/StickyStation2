<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Store>
 */
class StoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'store_name' => fake()->sentence(3),
            'store_image' => fake()->imageUrl(),
            'store_description' => fake()->paragraph(),
            'store_status' => fake()->randomElement(['featured', 'not featured']),
        ];
    }
}
