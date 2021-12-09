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
        $isPenulisOrSiswa = boolval($this->faker->numberBetween(0, 1));
        return [
            'id' => $this->faker->uuid(),
            'materi_id' => DB::table("materi")->inRandomOrder()->limit(1)->first()->id,
            'penulis_id' =>  $isPenulisOrSiswa ? DB::table("penulis")->inRandomOrder()->limit(1)->first()->id : null,
            'siswa_id' => !$isPenulisOrSiswa ? DB::table("siswa")->inRandomOrder()->limit(1)->first()->id : null,
            'konten' => Content::exampleComment()
        ];
    }
}
