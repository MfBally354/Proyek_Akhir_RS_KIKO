<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('dokter', function (Blueprint $table) {
            $table->id('id_dokter');
            $table->string('nama_dokter', 100);
            $table->string('spesialisasi', 100)->nullable();
            $table->unsignedBigInteger('id_poli');
            $table->timestamps();

            $table->foreign('id_poli')->references('id_poli')->on('poliklinik')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('dokter');
    }
};
