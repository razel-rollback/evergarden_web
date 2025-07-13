<?php

namespace Database\Factories;

use App\Models\Account;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    protected $model = \App\Models\Customer::class;

    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name'  => $this->faker->lastName,
            'phone'      => '09' . $this->faker->numerify('#########'),
            'gender'     => $this->faker->randomElement(['Male', 'Female']),
            'birth_date' => $this->faker->date(),
            'address'    => $this->faker->address,
            'account_id' => Account::factory(),
        ];
    }
}
