<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'method' => $this->faker->randomElement(['credit_card', 'paypal', 'cash']),
            'gateway' => function (array $attributes) {
                return $attributes['method'] === 'cash' ? null : $this->faker->randomElement(['stripe', 'paypal', 'square']);
            },
            'reference' => function (array $attributes) {
                return $attributes['method'] === 'cash' ? null : $this->faker->uuid;
            },
            'transaction_code' => $this->faker->unique()->numerify('TRANS###'),
            'amount' => $this->faker->randomFloat(2, 10, 1000),
            'status' => $this->faker->randomElement(['pending', 'completed', 'failed']),
            'paid_at' => $this->faker->dateTime,
        ];
    }
}
