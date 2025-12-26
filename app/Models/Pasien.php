<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Pasien extends Model
{
    use HasFactory;

    protected $table = 'pasien';
    protected $primaryKey = 'id_pasien';

    protected $fillable = [
        'nomor_rm', 
        'nik',
        'nama_pasien', 
        'tgl_lahir', 
        'jenis_kelamin', 
        'golongan_darah',
        'riwayat_penyakit',
        'riwayat_alergi',
        'no_bpjs',
        'alamat'
    ];

    // 1. Menghitung Usia Otomatis
    public function getUsiaAttribute()
    {
        return Carbon::parse($this->tgl_lahir)->age . ' Tahun';
    }

    // 2. RELASI KE REKAM MEDIS (INI YANG KURANG TADI)
    // Artinya: Satu Pasien bisa memiliki Banyak Rekam Medis
    public function rekamMedis()
    {
        return $this->hasMany(RekamMedis::class, 'id_pasien');
    }
}