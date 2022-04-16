<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAngketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('angket', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('materi_id');
            $table->uuid('penulis_id');
            $table->uuid('siswa_id');
            $table->boolean("kejelasan_pembelajaran")->default(false);
            $table->boolean("kelengkapan_materi")->default(false);
            $table->boolean("contoh_penjelasan")->default(false);
            $table->boolean("kejelasan_bahasa")->default(false);
            $table->boolean("pemahaman_materi")->default(false);
            $table->boolean("kejelasan_informasi")->default(false);
            $table->boolean("penggunaan_media")->default(false);
            $table->boolean("keektifan_media")->default(false);
            $table->boolean("kemudahan_interaksi")->default(false);
            $table->boolean("kemudahan_pemakaian")->default(false);
            $table->timestamps();

            $table->foreign('materi_id')->references('id')->on('materi')->onDelete('cascade');
            $table->foreign('penulis_id')->references('id')->on('penulis')->onDelete('cascade');
            $table->foreign('siswa_id')->references('id')->on('siswa')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('angkets');
    }
}
