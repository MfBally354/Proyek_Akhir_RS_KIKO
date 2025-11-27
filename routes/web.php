<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasienController; // Panggil controllernya

Route::middleware(['role:admin'])->group(function() {
    Route::resource('dokter', DokterController::class);
    Route::resource('jadwal', JadwalController::class);
});

// Route untuk Halaman Daftar Pasien
Route::get('/pasien', [PasienController::class, 'index'])->name('pasien.index');
