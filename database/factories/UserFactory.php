<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'gender' => fake()->randomElement(['male', 'female', 'other']),
            'date_of_birth' => fake()->date(),
            'phone' => fake()->phoneNumber(),
            'secondary_phone' => fake()->phoneNumber(),
            'country' => fake()->country(),
            'isResident' => fake()->randomElement(['yes', 'no']),
            'street' => fake()->streetName(),
            'city' => fake()->city(),
            'town' => fake()->city(),
            'division' => fake()->city(),
            'postal_address' => fake()->address(),
            'tin' => fake()->numberBetween('1234', '9999'),
            'vaccination_ref_number' => fake()->numberBetween('1234', '9999'),
            'status' => fake()->randomElement(['0', '1']),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
