<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $ranges = ['1-2', '2-3', '3-4', '5+'];
        return [
            'category_id' => $this->faker->numberBetween(1, 10),
            'title' => $title = $this->faker->jobTitle,
            'description' => $this->faker->paragraph,
            'experience' => $this->faker->randomElement($ranges),
            'type' => $this->faker->randomElement(['full-time', 'part-time', 'contract', 'temporary', 'internship', 'volunteer', 'freelance']),
            'slug' => Str::slug($title),
            'vacancy' => $this->faker->numberBetween(1, 10),
            'location' => $this->faker->city,
            'salary_range' => $this->faker->numberBetween(1000, 9000),
            'application_link' => $this->faker->url,
            'application_email' => $this->faker->safeEmail,
            'application_phone' => $this->faker->phoneNumber,
            'start_date' => $this->faker->dateTimeBetween('now', '+1 month'),
            'expiration_date' => $this->faker->dateTimeBetween('+1 month', '+6 months'),
            'status' => $this->faker->randomElement(['active', 'inactive', 'expired']),
            'duration' => $this->faker->randomElement(['1 month', '2 months', '3 months', '6 months', '1 year', '2 years', '3 years', '4 years', '5 years']),
        ];
    }
}
