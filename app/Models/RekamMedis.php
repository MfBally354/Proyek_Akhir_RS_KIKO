<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('rekam_medis', function (Blueprint $table) {
            $table->id('id_rekam_medis');

            $table->unsignedBigInteger('id_pasien');
            $table->unsignedBigInteger('id_poli');
            $table->unsignedBigInteger('id_dokter');
            $table->unsignedBigInteger('id_user_input');

            $table->dateTime('tgl_periksa');
            $table->text('keluhan')->nullable();
            $table->text('diagnosa')->nullable();
            $table->text('resep_obat')->nullable();

            $table->timestamps();

            // Foreign keys
            $table->foreign('id_pasien')->references('id_pasien')->on('pasien')->onDelete('cascade');
            $table->foreign('id_poli')->references('id_poli')->on('poliklinik')->onDelete('cascade');
            $table->foreign('id_dokter')->references('id_dokter')->on('dokter')->onDelete('cascade');
            $table->foreign('id_user_input')->references('id_user')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('rekam_medis');
    }
};
