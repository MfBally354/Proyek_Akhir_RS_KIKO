<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class PerawatController extends Controller
{
    // 1. Tampilkan Daftar Perawat
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        
        // Ambil user yang role-nya 'Perawat' (id_role = 2)
        // Atau ambil semua user KECUALI Admin yang sedang login (opsional)
        $query = User::where('id_role', 2); 

        if ($keyword) {
            $query->where(function($q) use ($keyword) {
                $q->where('nama_lengkap', 'like', "%{$keyword}%")
                  ->orWhere('username', 'like', "%{$keyword}%")
                  ->orWhere('email', 'like', "%{$keyword}%");
            });
        }

        $perawats = $query->orderBy('id_user', 'desc')->paginate(10);
        
        return view('perawat.index', compact('perawats'));
    }

    // 2. Form Tambah Perawat
    public function create()
    {
        return view('perawat.create');
    }

    // 3. Simpan Perawat Baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:100',
            'username' => 'required|string|max:50|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
        ]);

        // Simpan ke database dengan Role ID 2 (Perawat)
        User::create([
            'nama_lengkap' => $request->nama_lengkap,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Enkripsi Password
            'id_role' => 2, // Paksa jadi Perawat
        ]);

        return redirect()->route('perawat.index')->with('success', 'Data Perawat berhasil ditambahkan');
    }

    // 4. Form Edit Perawat
    public function edit($id)
    {
        $perawat = User::findOrFail($id);
        return view('perawat.edit', compact('perawat'));
    }

    // 5. Update Data Perawat
    public function update(Request $request, $id)
    {
        $perawat = User::findOrFail($id);

        $rules = [
            'nama_lengkap' => 'required|string|max:100',
            'username' => 'required|string|max:50|unique:users,username,' . $id . ',id_user',
            'email' => 'required|email|unique:users,email,' . $id . ',id_user',
        ];

        // Jika password diisi, validasi password baru. Jika kosong, abaikan.
        if ($request->filled('password')) {
            $rules['password'] = 'string|min:6';
        }

        $request->validate($rules);

        $dataUpdate = [
            'nama_lengkap' => $request->nama_lengkap,
            'username' => $request->username,
            'email' => $request->email,
        ];

        // Hanya update password jika input tidak kosong
        if ($request->filled('password')) {
            $dataUpdate['password'] = Hash::make($request->password);
        }

        $perawat->update($dataUpdate);

        return redirect()->route('perawat.index')->with('success', 'Data Perawat berhasil diperbarui');
    }

    // 6. Hapus Data Perawat
    public function destroy($id)
    {
        $perawat = User::findOrFail($id);
        
        // Proteksi: Jangan sampai Admin menghapus dirinya sendiri (meski query awal sudah filter)
        if ($perawat->id_role == 1) {
            return back()->with('error', 'Anda tidak dapat menghapus akun Administrator.');
        }

        $perawat->delete();
        return redirect()->route('perawat.index')->with('success', 'Data Perawat berhasil dihapus');
    }
}