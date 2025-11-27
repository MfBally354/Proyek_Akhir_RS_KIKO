<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rekam_medis', function (Blueprint $table) {
            $table->id();
            // Relasi ke tabel pasien
            $table->unsignedBigInteger('patient_id');
            $table->string('diagnosa');
            $table->string('resep')->nullable();
            $table->string('tindakan')->nullable();
            $table->timestamps();

            // Foreign key ke tabel pasien
            $table->foreign('patient_id')
                  ->references('id')
                  ->on('patients')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rekam_medis');
    }
};
