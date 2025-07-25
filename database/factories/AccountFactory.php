<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Account>
 */
class AccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'username'  => $this->faker->userName,
            'password'  => bcrypt('password'), // hashed default
            'email'     => $this->faker->unique()->safeEmail,
            'googleid'  => null,
            'role_id'   => 2,
        ];
    }
}
