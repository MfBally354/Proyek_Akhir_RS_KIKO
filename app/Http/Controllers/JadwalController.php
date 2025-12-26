<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Dokter;

class JadwalController extends Controller
{
    // 1. Tampilkan Daftar Jadwal
    public function index() {
        // Ambil jadwal beserta data dokternya
        $jadwals = Jadwal::with('dokter')->paginate(10);
        return view('jadwal.index', compact('jadwals'));
    }

    // 2. Form Tambah Jadwal
    public function create() {
        // Kita butuh data dokter untuk dropdown pilihan
        $dokters = Dokter::all();
        return view('jadwal.create', compact('dokters'));
    }

    // 3. Simpan Data
    public function store(Request $request) {
        $request->validate([
            'dokter_id' => 'required',
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
        ]);

        Jadwal::create([
            'dokter_id' => $request->dokter_id,
            'hari' => $request->hari,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
        ]);

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil ditambahkan');
    }

    // 4. Form Edit
    public function edit($id) {
        $jadwal = Jadwal::findOrFail($id);
        $dokters = Dokter::all();
        return view('jadwal.edit', compact('jadwal','dokters'));
    }

    // 5. Update Data
    public function update(Request $request, $id) {
        $request->validate([
            'dokter_id' => 'required',
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
        ]);

        $jadwal = Jadwal::findOrFail($id);
        $jadwal->update($request->all());
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil diperbarui');
    }

    // 6. Hapus Data
    public function destroy($id) {
        Jadwal::destroy($id);
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dihapus');
    }
}