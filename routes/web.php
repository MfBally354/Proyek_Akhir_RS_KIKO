<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\RekamMedisController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

// Homepage → redirect ke login
Route::get('/', function () {
    return redirect('/login');
});

// Halaman Login
Route::get('/login', [AuthController::class, 'login'])->name('login');

// Login Tenaga Medis
Route::get('/login-medical', [AuthController::class, 'loginMedical'])->name('login.medical');

// Beranda / Landing Page
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Rekam Medis
Route::get('/pasien/{id}/rekam-medis', [RekamMedisController::class, 'index'])->name('rekam.index');
Route::get('/pasien/{id}/rekam-medis/create', [RekamMedisController::class, 'create'])->name('rekam.create');
Route::post('/pasien/{id}/rekam-medis', [RekamMedisController::class, 'store'])->name('rekam.store');

// Route untuk Halaman Daftar Pasien
Route::get('/pasien', [PasienController::class, 'index'])->name('pasien.index');

// Route dengan login autentikasi umum
Route::middleware(['auth'])->group(function () {
    Route::resource('dokter', DokterController::class);
    Route::resource('jadwal', JadwalController::class);
});

// Route khusus admin
Route::middleware(['role:admin'])->group(function () {
    Route::resource('dokter', DokterController::class);
    Route::resource('jadwal', JadwalController::class);
});

