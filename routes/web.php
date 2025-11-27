<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\RekamMedisController;

Route::get('/pasien/{id}/rekam-medis', [RekamMedisController::class, 'index'])->name('rekam.index');
Route::get('/pasien/{id}/rekam-medis/create', [RekamMedisController::class, 'create'])->name('rekam.create');
Route::post('/pasien/{id}/rekam-medis', [RekamMedisController::class, 'store'])->name('rekam.store');

