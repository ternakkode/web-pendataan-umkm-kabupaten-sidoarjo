<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUmkmLegalitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('umkm_legalitas', function (Blueprint $table) {
            $table->unsignedBigInteger('id_umkm');
            $table->unsignedBigInteger('id_legalitas');

            $table->foreign('id_umkm')->references('id')->on('umkm');
            $table->foreign('id_legalitas')->references('id')->on('legalitas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('umkm_legalitas');
    }
}
