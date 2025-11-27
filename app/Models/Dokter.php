<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    protected $table = 'dokter';

    protected $fillable = [
        'nama_dokter',
        'spesialisasi',
        'id_poli'
    ];

    public function poli()
    {
        return $this->belongsTo(Poliklinik::class, 'id_poli');
    }

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class, 'id_dokter');
    }
}
