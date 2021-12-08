<?php

namespace Database\Factories;

use Helpers\Content;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class MateriFactory extends Factory
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
            'opsi_materi_id' => DB::table("opsi_materi")->inRandomOrder()->limit(1)->first()->id,
            'penulis_id' => DB::table("penulis")->inRandomOrder()->limit(1)->first()->id,
            'judul' => $this->faker->sentence(4),
            'durasi' => '1 Jam 30 Menit',
            'konten' => Content::courseExampleDescription()
        ];
    }
}
