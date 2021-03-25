<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUmkmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('umkm', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_user');
            $table->integer('nib');
            $table->string('nama_usaha', 100);
            $table->unsignedBigInteger('id_lama_usaha');
            $table->unsignedBigInteger('id_jenis_usaha');
            $table->unsignedBigInteger('id_modal');
            $table->integer('npwp');
            $table->integer('tahun_pendataan');
            $table->boolean('telah_diterima');
            $table->date('diterima_pada')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('umkm');
    }
}
