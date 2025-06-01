<?php

namespace App\Models;

use App\Models\Perbaikan;
use App\Models\Peminjaman;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_barang',
        'spesifikasi',
        'stok',
        'kondisi',
    ];

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }

    public function perbaikan()
    {
        return $this->hasMany(Perbaikan::class);
    }
}
