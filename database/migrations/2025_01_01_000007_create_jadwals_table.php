<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jadwals', function (Blueprint $table) {
            $table->id(); // Default ID
            
            // Relasi ke tabel 'dokter' (kolom id_dokter)
            // Kita gunakan nama kolom 'dokter_id' agar cocok dengan Controller kamu
            $table->unsignedBigInteger('dokter_id');
            $table->foreign('dokter_id')->references('id_dokter')->on('dokter')->onDelete('cascade');
            
            $table->string('hari');
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jadwals');
    }
};