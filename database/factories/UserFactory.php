<?php

namespace Database\Factories;

use App\Helpers\Helper;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory {
    /**
     * Define the model's default state.
     * @return array<string, mixed>
     */
    public function definition() {
        return [
            'first_name' => $firstName = $this->faker->firstName,
            'last_name' => $lastName = $this->faker->lastName,
            'username' => Helper::generateSlug(User::class, $firstName . ' ' . $lastName, 'username'),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => $this->faker->randomElement([
                NULL,
                now(),
            ]),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'number_of_vehicles' => rand(1, 10),
            'gender' => rand(1, 2),
            'remember_token' => NULL,
            'created_at' => $createdAt = $this->faker->dateTime(),
            'updated_at' => $createdAt,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     * @return static
     */
    public function unverified() {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => NULL,
        ]);
    }
}
