<?php

namespace App\Models;

use App\Models\Perbaikan;
use App\Models\Peminjaman;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Petugas extends Authenticatable {
    use HasFactory;

    protected $table = 'petugas';

    protected $fillable = [
        'nama_lengkap', 
        'email', 
        'password',
        'nomor_telepon'
    ];

    protected $hidden = ['password'];
    
    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }

    public function perbaikan()
    {
        return $this->hasMany(Perbaikan::class);
    }
}
