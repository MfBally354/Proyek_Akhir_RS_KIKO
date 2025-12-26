<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pasien;
use App\Models\Dokter;
use App\Models\RekamMedis; // Tambahkan Model Rekam Medis
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon; // Tambahkan Library Waktu

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        
        $hasilUser = [];
        $hasilPasien = [];
        $hasilDokter = [];
        
        // --- STATISTIK DASHBOARD (KHUSUS ADMIN) ---
        $stats = [];
        if (Auth::check() && Auth::user()->id_role == 1) {
            $now = Carbon::now();

            // 1. Statistik Pasien
            $stats['pasien_hari'] = Pasien::whereDate('created_at', $now->today())->count();
            $stats['pasien_bulan'] = Pasien::whereMonth('created_at', $now->month)->whereYear('created_at', $now->year)->count();
            $stats['pasien_tahun'] = Pasien::whereYear('created_at', $now->year)->count();

            // 2. Statistik Rekam Medis
            $stats['rm_hari'] = RekamMedis::whereDate('created_at', $now->today())->count();
            $stats['rm_bulan'] = RekamMedis::whereMonth('created_at', $now->month)->whereYear('created_at', $now->year)->count();
            $stats['rm_tahun'] = RekamMedis::whereYear('created_at', $now->year)->count();
        }

        // --- LOGIKA PENCARIAN ---
        if ($keyword) {
            if (!Auth::check()) {
                return redirect()->route('login')->withErrors(['username' => 'Silakan login terlebih dahulu untuk mencari data.']);
            }

            $hasilUser = User::where('nama_lengkap', 'like', "%$keyword%")
                             ->orWhere('email', 'like', "%$keyword%")
                             ->get();

            $hasilPasien = Pasien::where('nama_pasien', 'like', "%$keyword%")
                                 ->orWhere('nomor_rm', 'like', "%$keyword%")
                                 ->get();

            $hasilDokter = Dokter::with('poli')
                                 ->where('nama_dokter', 'like', "%$keyword%")
                                 ->orWhere('spesialisasi', 'like', "%$keyword%")
                                 ->get();
        }

        // Kirim variabel $stats ke view
        return view('home', compact('hasilUser', 'hasilPasien', 'hasilDokter', 'keyword', 'stats'));
    }

    public function profile()
    {
        $user = auth()->user();
        return view('profile', compact('user'));
    }
}