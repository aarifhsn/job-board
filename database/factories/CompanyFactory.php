<?php

namespace Database\Factories;

use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $name = $this->faker->company,
            'slug' => Str::slug($name.'-'.uniqid()),
            'email' => $this->faker->unique()->safeEmail,
            'contact_number' => $this->faker->phoneNumber,
            'industry' => $this->faker->word,
            'website' => $this->faker->url,
            'logo' => $this->faker->imageUrl(),
            'address' => $this->faker->address,
            'city' => $this->faker->city,
            'state' => $this->faker->state,
            'country' => $this->faker->country,
            'pincode' => $this->faker->postcode,
            'description' => $this->faker->paragraph,
            'status' => 'active',
            'user_id' => 1,
        ];
    }

    /**
     * Indicate that the company has jobs.
     */
    public function withJobs(int $count = 5): static
    {
        return $this->has(Job::factory()->count($count), 'jobs');
    }
}
