<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('poliklinik', function (Blueprint $table) {
            $table->id('id_poli');
            $table->string('nama_poli', 100);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('poliklinik');
    }
};
