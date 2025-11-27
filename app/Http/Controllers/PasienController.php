<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien; // Panggil Model Pasien

class PasienController extends Controller
{
    public function index()
    {
        // Ambil semua data pasien, urutkan dari yang terbaru
        $pasien = Pasien::orderBy('id_pasien', 'desc')->get();

        // Kirim data ke View (resources/views/pasien/index.blade.php)
        return view('pasien.index', compact('pasien'));
    }
    
    // Nanti kamu bisa tambahkan function create(), store(), edit(), update(), destroy() di sini
}
