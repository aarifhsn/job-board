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
        $ranges = ['0', '1-2', '3-5', '6+'];

        return [
            'category_id' => $this->faker->numberBetween(1, 10),
            'title' => $title = $this->faker->jobTitle,
            'description' => $this->faker->paragraph,
            'experience' => $this->faker->randomElement($ranges),
            'type' => $this->faker->randomElement(['full-time', 'part-time', 'contract', 'temporary', 'internship', 'volunteer', 'freelance']),
            'slug' => Str::slug($title),
            'vacancy' => $this->faker->numberBetween(1, 10),
            'qualification' => $this->faker->randomElement(['B.Tech CSE', 'B.Tech IT', 'B.Sc CS', 'BCA', 'M.Tech CSE', 'M.Tech IT', 'M.Sc CS', 'MCA', 'Diploma CS', 'B.Sc IT', 'B.Tech SE', 'B.Tech CE', 'B.Tech CS', 'M.Sc WebTech', 'M.Sc DS']),
            'location' => $this->faker->randomElement(['New York', 'London', 'Paris', 'Berlin', 'San Francisco', 'Los Angeles', 'Chicago', 'Houston', 'Dallas', 'Seattle', 'Miami', 'Toronto', 'Vancouver', 'Montreal', 'Sydney', 'Melbourne', 'Brisbane', 'Perth', 'Adelaide', 'Auckland', 'Wellington', 'Christchurch', 'Hamilton', 'Tauranga', 'Dunedin', 'Queenstown', 'Rotorua', 'Napier', 'Hastings', 'Palmerston North', 'Nelson', 'Whangarei', 'Invercargill', 'Gisborne', 'Taranaki', 'Manawatu', 'Wanganui', 'Hawkes Bay', 'Bay of Plenty', 'Northland', 'Southland', 'West Coast', 'Canterbury', 'Otago', 'Marlborough', 'Tasman', 'Waikato']),
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
