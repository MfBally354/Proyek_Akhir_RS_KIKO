<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\RekamMedisController;

// --- HALAMAN PUBLIK (Bisa Diakses Siapa Saja) ---

// 1. Redirect Halaman Awal ke /home
Route::get('/', function () {
    return redirect()->route('home');
});

// 2. Beranda (Dashboard) kita keluarkan dari middleware auth
// Agar tamu bisa melihat halaman depan & melakukan pencarian
Route::get('/home', [HomeController::class, 'index'])->name('home');


// --- JALUR TAMU (KHUSUS YANG BELUM LOGIN) ---
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate'])->name('login.process');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'store'])->name('register.store');
});

// --- JALUR MEMBER (KHUSUS YANG SUDAH LOGIN) ---
Route::middleware(['auth'])->group(function () {
    
    // Route Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Profil
    Route::get('/profile', [HomeController::class, 'profile'])->name('profile');

    // Menu Admin/Perawat (CRUD)
    Route::resource('pasien', PasienController::class);
    Route::resource('dokter', DokterController::class);
    Route::resource('jadwal', JadwalController::class);
    Route::resource('perawat', \App\Http\Controllers\PerawatController::class);

    // Rekam Medis
    Route::prefix('rekam-medis')->name('rekam_medis.')->group(function () {
        Route::get('/riwayat/{id_pasien}', [RekamMedisController::class, 'index'])->name('index');
        Route::get('/create/{id_pasien}', [RekamMedisController::class, 'create'])->name('create');
        Route::post('/store/{id_pasien}', [RekamMedisController::class, 'store'])->name('store');
    });
});