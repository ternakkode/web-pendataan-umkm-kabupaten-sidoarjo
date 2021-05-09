<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email', 100)->unique();
            $table->string('username', 100)->unique();
            $table->string('password', 100);
            $table->string('nama', 100);
            $table->bigInteger('nik')->nullable();
            $table->string('no_hp', 20)->nullable();
            $table->string('pendidikan_terakhir', 50)->nullable();
            $table->string('foto_profil', 100)->nullable();
            $table->boolean('telah_terverifikasi')->nullable();
            $table->string('kode_verifikasi')->nullable();
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
        Schema::dropIfExists('user');
    }
}
