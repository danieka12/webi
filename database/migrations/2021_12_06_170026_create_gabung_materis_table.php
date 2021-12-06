<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGabungMaterisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gabung_materi', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('guru_id');
            $table->uuid('siswa_id');
            $table->uuid('materi_id');
            $table->boolean('konfirmasi_gabung');
            $table->timestamps();

            $table->foreign('guru_id')->references('id')->on('guru')->onDelete('cascade');
            $table->foreign('siswa_id')->references('id')->on('siswa')->onDelete('cascade');
            $table->foreign('materi_id')->references('id')->on('materi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gabung_materis');
    }
}
