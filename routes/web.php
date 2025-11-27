<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\RekamMedisController;

Route::get('/pasien/{id}/rekam-medis', [RekamMedisController::class, 'index'])->name('rekam.index');
Route::get('/pasien/{id}/rekam-medis/create', [RekamMedisController::class, 'create'])->name('rekam.create');
Route::post('/pasien/{id}/rekam-medis', [RekamMedisController::class, 'store'])->name('rekam.store');

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

// Halaman Login
Route::get('/login', [AuthController::class, 'login'])->name('login');

// Login Tenaga Medis
Route::get('/login-medical', [AuthController::class, 'loginMedical'])->name('login.medical');

// Beranda / Landing Page
Route::get('/home', [HomeController::class, 'index'])->name('home');
