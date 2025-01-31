<?php

namespace Database\Factories;

use App\Models\Job;
use App\Models\Role;
use App\Models\Company;
use Illuminate\Support\Str;
use App\Models\Subscription;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    /**
     * Assign roles to the user.
     */
    public function withRole(string $role): static
    {
        return $this->afterCreating(function ($user) use ($role) {
            $roleIds = Role::where('name', $role)->pluck('id')->toArray();
            $user->roles()->attach($roleIds);
        });
    }
}
