<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GuruFactory extends Factory
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
            'email' => $this->faker->email(),
            'name' => $this->faker->name(),
            'password' => $this->faker->sentence(15)
        ];
    }
}
