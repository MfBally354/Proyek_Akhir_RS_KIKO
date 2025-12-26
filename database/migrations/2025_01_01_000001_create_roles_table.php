<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            // Kita ubah nama ID default 'id' menjadi 'id_role' agar sesuai Model
            $table->id('id_role'); 
            
            // Kita tambahkan kolom nama role
            $table->string('nama_role', 50); 
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};