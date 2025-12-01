<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\RekamMedisController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.process');
Route::get('/login-medical', [AuthController::class, 'loginMedical'])->name('login.medical');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

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

Route::middleware(['role:admin'])->group(function () {
    Route::resource('dokter', DokterController::class);
    Route::resource('jadwal', JadwalController::class);
});
