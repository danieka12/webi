<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class TujuanPembelajaranFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'guru_id' => DB::table("guru")->inRandomOrder()->limit(1)->first()->id,
            'description' => $this->faker->randomHtml(2, 3)
        ];
    }
}
