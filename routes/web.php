<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasienController; // Panggil controllernya

Route::get('/', function () {
    return view('welcome');
});

// Route untuk Halaman Daftar Pasien
Route::get('/pasien', [PasienController::class, 'index'])->name('pasien.index');
