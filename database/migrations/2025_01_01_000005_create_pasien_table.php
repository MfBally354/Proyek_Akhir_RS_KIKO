<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pasien', function (Blueprint $table) {
            $table->id('id_pasien');
            $table->string('nomor_rm', 20)->unique(); // Rekam Medis
            $table->string('nik', 20)->nullable(); // Tambahan: NIK KTP
            $table->string('nama_pasien', 100);
            $table->date('tgl_lahir');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            
            // --- DATA TAMBAHAN SESUAI REQUEST ---
            $table->string('golongan_darah', 5)->nullable(); // A, B, AB, O
            $table->text('riwayat_penyakit')->nullable(); // Diabetes, Jantung, dll
            $table->text('riwayat_alergi')->nullable(); // Obat, Makanan
            $table->string('no_bpjs', 20)->nullable(); // Tambahan Umum RS
            
            $table->text('alamat');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pasien');
    }
};