<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GuardianFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name'   => $this->faker->name(),
            'job'    => $this->faker->jobTitle(),
            'phone'  => $this->faker->phoneNumber(),
            'email'  => $this->faker->unique()->safeEmail(),
            'address'=> $this->faker->address(),
        ];
    }
}
