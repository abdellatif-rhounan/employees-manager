<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EmployeeFactory extends Factory
{
    public function definition(): array
    {
        return [
            'id' => Str::uuid(),
            //******************
            'first_name' => fake()->firstName(null),
            'last_name' => fake()->lastName,
            'identity_number' => fake()->unique()->randomNumber(8, false),
            'date_of_birth' => fake()->date('Y-m-d', '1970-01-01'),
            'nationality' => fake()->country,
            //******************
            'email' => fake()->unique()->email,
            'phone' => fake()->e164PhoneNumber,
            'address' => fake()->address,
            'social_insurance_number' => fake()->unique()->randomNumber(8, false),
            //******************
            'department' => fake()->randomElement(['it', 'finnance', 'marketing']),
            'position' => fake()->jobTitle,
            'status' => fake()->randomElement(['active', 'stopped', 'vacation', 'unavailable']),
            'city_center' => fake()->city,
            'country' => fake()->country,
            'salary' => fake()->randomFloat(2, 2500, 10000),
            'account_rib' => fake()->bankAccountNumber,
            'hire_date' => fake()->date('Y-m-d', 'now'),
            'termination_date' => null,
        ];
    }
}
