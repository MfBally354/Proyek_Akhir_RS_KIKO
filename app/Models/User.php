<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'id_user';

    // Agar created_at dan updated_at terisi otomatis
    public $timestamps = true;

    protected $fillable = [
        'nama_lengkap',
        'username',
        'email',      // <--- INI TAMBAHAN PENTINGNYA
        'password',
        'id_role',
    ];

    protected $hidden = [
        'password',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'id_role');
    }

    public function rekamMedis()
    {
        return $this->hasMany(RekamMedis::class, 'id_user_input');
    }
}