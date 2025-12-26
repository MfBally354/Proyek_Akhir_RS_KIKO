<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\Poli;
use App\Models\Dokter;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat Data Role
        $roleAdmin = Role::create(['nama_role' => 'Admin']);
        $rolePerawat = Role::create(['nama_role' => 'Perawat']);

        // 2. Buat User Admin (LENGKAP DENGAN EMAIL)
        User::create([
            'nama_lengkap' => 'Admin Sistem',
            'username' => 'admin',
            'email' => 'admin@admin', // <--- Email Khusus Admin
            'password' => Hash::make('admin123'),
            'id_role' => $roleAdmin->id_role,
        ]);

        // 3. Buat User Perawat (LENGKAP DENGAN EMAIL)
        User::create([
            'nama_lengkap' => 'Suster Siti',
            'username' => 'siti',
            'email' => 'siti@user', // <--- Email Khusus Perawat
            'password' => Hash::make('siti123'),
            'id_role' => $rolePerawat->id_role,
        ]);

        // 4. Buat Data Poli
        $poliUmum = Poli::create(['nama_poli' => 'Poli Umum']);
        Poli::create(['nama_poli' => 'Poli Gigi']);
        Poli::create(['nama_poli' => 'Poli Anak']);

        // 5. Buat Data Dokter
        Dokter::create([
            'nama_dokter' => 'dr. Budi Santoso',
            'spesialisasi' => 'Umum',
            'id_poli' => $poliUmum->id_poli
        ]);
    }
}