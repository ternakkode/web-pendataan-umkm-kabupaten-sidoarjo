<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationToUmkm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('umkm', function (Blueprint $table) {
            $table->foreign('id_user')->references('id')->on('user');
            $table->foreign('id_lama_usaha')->references('id')->on('lama_usaha');
            $table->foreign('id_jenis_usaha')->references('id')->on('jenis_usaha');
            $table->foreign('id_modal')->references('id')->on('modal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('umkm', function (Blueprint $table) {
            $table->dropForeign(['id_user', 'id_lama_usaha', 'id_jenis_usaha', 'id_modal']);
        });
    }
}
