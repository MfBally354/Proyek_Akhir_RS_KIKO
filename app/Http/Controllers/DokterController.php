<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokter;
use App\Models\Poli; // Kita butuh data Poli untuk dropdown

class DokterController extends Controller
{
    // 1. Tampilkan Daftar Dokter
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $query = Dokter::with('poli'); // Eager load relasi poli agar efisien

        if ($keyword) {
            $query->where('nama_dokter', 'like', "%{$keyword}%")
                  ->orWhere('spesialisasi', 'like', "%{$keyword}%");
        }

        $dokters = $query->orderBy('id_dokter', 'desc')->paginate(10);
        return view('dokter.index', compact('dokters'));
    }

    // 2. Form Tambah
    public function create()
    {
        $polis = Poli::all(); // Ambil semua data poli untuk dropdown
        return view('dokter.create', compact('polis'));
    }

    // 3. Simpan Data
    public function store(Request $request)
    {
        $request->validate([
            'nama_dokter' => 'required',
            'spesialisasi' => 'required',
            'kontak' => 'required',
            'id_poli' => 'required',
        ]);

        Dokter::create($request->all());
        return redirect()->route('dokter.index')->with('success', 'Data Dokter berhasil ditambahkan');
    }

    // 4. Form Edit
    public function edit($id)
    {
        $dokter = Dokter::findOrFail($id);
        $polis = Poli::all();
        return view('dokter.edit', compact('dokter', 'polis'));
    }

    // 5. Update Data
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_dokter' => 'required',
            'spesialisasi' => 'required',
            'kontak' => 'required',
            'id_poli' => 'required',
        ]);

        $dokter = Dokter::findOrFail($id);
        $dokter->update($request->all());

        return redirect()->route('dokter.index')->with('success', 'Data Dokter berhasil diperbarui');
    }

    // 6. Lihat Detail
    public function show($id)
    {
        // Ambil dokter beserta jadwal praktiknya
        $dokter = Dokter::with(['poli', 'jadwal'])->findOrFail($id);
        return view('dokter.show', compact('dokter'));
    }

    // 7. Hapus Data
    public function destroy($id)
    {
        $dokter = Dokter::findOrFail($id);
        $dokter->delete();
        return redirect()->route('dokter.index')->with('success', 'Data Dokter berhasil dihapus');
    }
}