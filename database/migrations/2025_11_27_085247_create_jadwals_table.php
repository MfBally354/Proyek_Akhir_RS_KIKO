Schema::create('jadwals', function (Blueprint $table) {
    $table->id();
    $table->foreignId('dokter_id')->constrained('dokters')->onDelete('cascade');
    $table->string('hari');
    $table->time('jam_mulai');
    $table->time('jam_selesai');
    $table->timestamps();
});
