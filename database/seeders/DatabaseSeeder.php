<?php

namespace Database\Seeders;

use App\Models\BalasKomentar;
use App\Models\GabungMateri;
use App\Models\MateriCoverGambar;
use App\Models\Penulis;
use App\Models\TujuanPembelajaran;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\Guru::factory(5)->has(Penulis::factory()->count(1), 'penulis')->create();
        \App\Models\OpsiMateri::factory(6)->create();
        \App\Models\Materi::factory(15)->has(MateriCoverGambar::factory()->count(1), 'materiCoverGambar')->has(TujuanPembelajaran::factory()->count(1), 'tujuanPembelajaran')->create();
        \App\Models\Siswa::factory(50)->has(GabungMateri::factory()->count(1), 'gabungMateri')->create();
        \App\Models\Mengajar::factory(5)->create();
        \App\Models\Komentar::factory(25)->has(BalasKomentar::factory()->count(10), 'balasKomentar')->create();
    }
}
