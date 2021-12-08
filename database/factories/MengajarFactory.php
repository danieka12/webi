<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class MengajarFactory extends Factory
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
            'materi_id' => DB::table("materi")->inRandomOrder()->limit(1)->first()->id,
            'guru_id' => DB::table("guru")->inRandomOrder()->limit(1)->first()->id
        ];
    }
}
