<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';
    protected $primaryKey = 'id_role';

    protected $fillable = ['nama_role'];

    // Relasi: Satu Role dimiliki banyak User
    public function users()
    {
        return $this->hasMany(User::class, 'id_role');
    }
}