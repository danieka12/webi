<?php

namespace Database\Factories;

use App\Models\Guru;
use Illuminate\Database\Eloquent\Factories\Factory;

class PenulisFactory extends Factory
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
            'guru_id' => Guru::factory(),
            'foto_profile' => $this->faker->image(),
            'description' => $this->faker->randomHtml(2, 3)
        ];
    }
}
