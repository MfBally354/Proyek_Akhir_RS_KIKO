Schema::create('dokters', function (Blueprint $table) {
    $table->id();
    $table->string('nama');
    $table->string('spesialis');
    $table->string('kontak')->nullable();
    $table->timestamps();
});

