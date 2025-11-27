<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'id_user';

    public $timestamps = true;

    protected $fillable = [
        'nama_lengkap',
        'username',
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
