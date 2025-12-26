<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poli extends Model
{
    use HasFactory;

    protected $table = 'poliklinik'; // Sesuai nama tabel di database
    protected $primaryKey = 'id_poli';

    protected $fillable = ['nama_poli'];

    // Relasi ke Dokter
    public function dokter()
    {
        return $this->hasMany(Dokter::class, 'id_poli');
    }
}