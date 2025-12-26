<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekamMedis extends Model
{
    use HasFactory;

    protected $table = 'rekam_medis';
    protected $primaryKey = 'id_rekam_medis';

    protected $fillable = [
        'id_pasien', 
        'id_poli', 
        'id_dokter', 
        'id_user_input',
        'tgl_periksa', 
        'keluhan', 
        'diagnosa', 
        'resep_obat'
    ];

    // Relasi ke tabel lain
    public function pasien() 
    { 
        return $this->belongsTo(Pasien::class, 'id_pasien'); 
    }
    
    public function dokter() 
    { 
        return $this->belongsTo(Dokter::class, 'id_dokter'); 
    }
    
    public function poli() 
    { 
        return $this->belongsTo(Poli::class, 'id_poli'); 
    }
    
    public function userInput() 
    { 
        return $this->belongsTo(User::class, 'id_user_input'); 
    }
}