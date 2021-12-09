<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBalasKomentarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balas_komentar', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('komentar_id');
            $table->uuid('penulis_id')->nullable();
            $table->uuid('siswa_id')->nullable();
            $table->text('konten');
            $table->timestamps();

            $table->foreign('komentar_id')->references('id')->on('komentar')->onDelete('cascade');
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
        Schema::dropIfExists('balas_komentars');
    }
}
