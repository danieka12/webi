<?php

namespace Database\Factories;

use Helpers\Content;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class KomentarFactory extends Factory
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
            'penulis_id' => DB::table("penulis")->inRandomOrder()->limit(1)->first()->id,
            'siswa_id' => DB::table("siswa")->inRandomOrder()->limit(1)->first()->id,
            'konten' => Content::exampleComment()
        ];
    }
}
