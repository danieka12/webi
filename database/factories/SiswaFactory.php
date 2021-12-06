<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->uuid(),
            'nis' => $this->faker->randomNumber(4),
            'name' => $this->faker->name(),
            'password' => $this->faker->sentence(1)
        ];
    }
}
