<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class GabungMateriFactory extends Factory
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
            'guru_id' => DB::table("guru")->inRandomOrder()->limit(1)->first()->id,
            'materi_id' => DB::table("materi")->inRandomOrder()->limit(1)->first()->id,
            'konfirmasi_gabung' => true
        ];
    }
}
