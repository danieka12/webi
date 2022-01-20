<?php

namespace Database\Factories;

use App\Models\Guru;
use Helpers\Content;
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
            'foto_profile' => 'http://via.placeholder.com/250x250',
            'description' => Content::teacherExampleDescription()
        ];
    }
}
