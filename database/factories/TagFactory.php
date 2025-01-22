<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 */
class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement(['Technology', 'Health', 'Finance', 'Education', 'Entertainment', 'Travel', 'Sports', 'Fashion', 'Food', 'Automobile', 'Web Development']),
            'slug' => $this->faker->unique()->slug,
        ];
    }
}
