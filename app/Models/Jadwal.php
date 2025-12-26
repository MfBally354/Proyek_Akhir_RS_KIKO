<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwals';
    // Primary key default adalah 'id', jadi tidak perlu ditulis
    
    protected $fillable = [
        'dokter_id',
        'hari',
        'jam_mulai',
        'jam_selesai'
    ];

    public function dokter() {
        return $this->belongsTo(Dokter::class, 'dokter_id');
    }
}