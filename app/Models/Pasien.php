<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    // Memberitahu Laravel nama tabel kita
    protected $table = 'pasien';

    // Memberitahu nama Primary Key
    protected $primaryKey = 'id_pasien';

    // Kolom mana saja yang boleh diisi
    protected $fillable = [
        'nomor_rm', 
        'nama_pasien', 
        'tgl_lahir', 
        'jenis_kelamin', 
        'alamat'
    ];

    // Matikan timestamps jika di tabelmu TIDAK ADA kolom created_at & updated_at
    public $timestamps = false;
}
