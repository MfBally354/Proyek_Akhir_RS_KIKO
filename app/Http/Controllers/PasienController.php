<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\RekamMedis; // Tambahkan ini
use Illuminate\Support\Facades\Auth; // Tambahkan ini

class PasienController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $mode = $request->input('mode'); // Cek mode (untuk rekap perawat)
        
        $query = Pasien::query();

        // LOGIKA KHUSUS PERAWAT: LIHAT REKAP INPUTAN SAYA
        if (Auth::user()->id_role == 2 && $mode == 'rekap_saya') {
            // Ambil pasien yang rekam medisnya pernah diinput oleh user ini
            $query->whereHas('rekamMedis', function($q) {
                $q->where('id_user_input', Auth::id());
            });
        }

        // Logika Pencarian
        if ($keyword) {
            $query->where('nama_pasien', 'like', "%{$keyword}%")
                  ->orWhere('nomor_rm', 'like', "%{$keyword}%");
        }

        $pasien = $query->orderBy('id_pasien', 'desc')->paginate(10);
        return view('pasien.index', compact('pasien'));
    }

    public function create()
    {
        $lastPasien = Pasien::latest('id_pasien')->first();
        $nextId = $lastPasien ? $lastPasien->id_pasien + 1 : 1;
        $nomor_rm_otomatis = 'RM-' . date('Y') . sprintf('%04d', $nextId);

        return view('pasien.create', compact('nomor_rm_otomatis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pasien' => 'required',
            'tgl_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
        ]);

        Pasien::create($request->all());
        return redirect()->route('pasien.index')->with('success', 'Data Pasien berhasil ditambahkan');
    }

    public function edit($id)
    {
        $pasien = Pasien::findOrFail($id);
        return view('pasien.edit', compact('pasien'));
    }

    public function update(Request $request, $id)
    {
        $pasien = Pasien::findOrFail($id);
        $pasien->update($request->all());
        return redirect()->route('pasien.index')->with('success', 'Data Pasien berhasil diperbarui');
    }

    public function show($id)
    {
        $pasien = Pasien::findOrFail($id);
        return view('pasien.show', compact('pasien'));
    }

    // UPDATE: HANYA ADMIN YANG BOLEH HAPUS
    public function destroy($id)
    {
        if (Auth::user()->id_role != 1) {
            return back()->with('error', 'Anda tidak memiliki akses untuk menghapus data.');
        }

        $pasien = Pasien::findOrFail($id);
        $pasien->delete();
        return redirect()->route('pasien.index')->with('success', 'Data Pasien berhasil dihapus');
    }
}