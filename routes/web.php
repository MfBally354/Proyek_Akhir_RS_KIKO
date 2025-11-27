Route::middleware(['auth'])->group(function() {
    Route::resource('dokter', DokterController::class);
    Route::resource('jadwal', JadwalController::class);
});

Route::middleware(['role:admin'])->group(function() {
    Route::resource('dokter', DokterController::class);
    Route::resource('jadwal', JadwalController::class);
});
