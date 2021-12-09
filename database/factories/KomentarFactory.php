<?php

namespace Database\Factories;

use Helpers\Content;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'materi_id' => "",
            'penulis_id' => "",
            'siswa_id' => "",
            'konten' => Content::exampleComment()
        ];
    }
}
