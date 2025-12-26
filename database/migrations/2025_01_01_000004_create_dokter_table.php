<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dokter', function (Blueprint $table) {
            $table->id('id_dokter');
            $table->string('nama_dokter', 100);
            $table->string('spesialisasi', 100);
            $table->string('kontak', 20)->nullable(); // Tambahan: Nomor HP/Telp
            $table->unsignedBigInteger('id_poli');
            $table->timestamps();

            // Relasi ke Poliklinik
            $table->foreign('id_poli')->references('id_poli')->on('poliklinik')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dokter');
    }
};