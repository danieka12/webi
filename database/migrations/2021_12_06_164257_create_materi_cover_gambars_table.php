<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriCoverGambarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materi_cover_gambar', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('materi_id');
            $table->string('cover', 100);
            $table->timestamps();

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
        Schema::dropIfExists('materi_cover_gambars');
    }
}
