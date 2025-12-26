<?php

namespace App\Http\Controllers;

use App\Models\RekamMedis;
use App\Models\Pasien;
use App\Models\Dokter;
use App\Models\Poli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RekamMedisController extends Controller
{
    // Tampilkan riwayat satu pasien
    public function index($id_pasien)
    {
        $pasien = Pasien::findOrFail($id_pasien);
        
        // Ambil rekam medis beserta data Dokter dan Poli-nya (Join)
        $records = RekamMedis::with(['dokter', 'poli', 'userInput'])
                    ->where('id_pasien', $id_pasien)
                    ->orderBy('tgl_periksa', 'desc')
                    ->get();

        return view('rekam_medis.index', compact('pasien', 'records'));
    }

    // Buka form tambah rekam medis
    public function create($id_pasien)
    {
        $pasien = Pasien::findOrFail($id_pasien);
        $dokters = Dokter::all(); // Kirim data dokter untuk dropdown
        $polis = Poli::all();     // Kirim data poli untuk dropdown
        
        return view('rekam_medis.create', compact('pasien', 'dokters', 'polis'));
    }

    // Simpan data rekam medis
    public function store(Request $request, $id_pasien)
    {
        $request->validate([
            'id_dokter' => 'required',
            'id_poli' => 'required',
            'tgl_periksa' => 'required|date',
            'keluhan' => 'required',
            'diagnosa' => 'required',
        ]);

        RekamMedis::create([
            'id_pasien' => $id_pasien,
            'id_dokter' => $request->id_dokter,
            'id_poli' => $request->id_poli,
            'id_user_input' => Auth::id(), // Otomatis ambil ID user yang login
            'tgl_periksa' => $request->tgl_periksa,
            'keluhan' => $request->keluhan,
            'diagnosa' => $request->diagnosa,
            'resep_obat' => $request->resep_obat,
        ]);

        return redirect()->route('rekam_medis.index', $id_pasien)
                         ->with('success', 'Rekam medis berhasil ditambahkan.');
    }
}