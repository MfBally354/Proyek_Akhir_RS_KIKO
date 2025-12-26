<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;

    protected $table = 'dokter';
    protected $primaryKey = 'id_dokter';

    protected $fillable = [
        'nama_dokter',
        'spesialisasi',
        'kontak', // Tambahan baru
        'id_poli'
    ];

    // Relasi ke Poliklinik
    public function poli()
    {
        return $this->belongsTo(Poli::class, 'id_poli');
    }

    // Relasi ke Jadwal
    public function jadwal()
    {
        return $this->hasMany(Jadwal::class, 'id_dokter');
    }
}