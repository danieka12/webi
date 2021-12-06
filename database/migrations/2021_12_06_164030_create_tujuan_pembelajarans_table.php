<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTujuanPembelajaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tujuan_pembelajaran', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('guru_id');
            $table->uuid('materi_id');
            $table->text('description');
            $table->timestamps();

            $table->foreign('materi_id')->references('id')->on('materi')->onDelete('cascade');
            $table->foreign('guru_id')->references('id')->on('guru')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tujuan_pembelajarans');
    }
}
