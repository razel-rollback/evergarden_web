<?php

namespace Database\Factories;

use App\Models\Account;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    protected $model = \App\Models\Employee::class;

    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName,
            'middle_name' => ($this->faker->firstName())[0],
            'last_name'  => $this->faker->lastName,
            'position' => $this->faker->jobTitle,
            'salary' => $this->faker->randomFloat(2, 30000, 100000),
            'hire_date' => $this->faker->date(),
            'fire_date' => null,
            'manager_id' => null,
            'account_id' => Account::factory()->state([
                'role_id' => 3,
            ]),
        ];
    }
}
