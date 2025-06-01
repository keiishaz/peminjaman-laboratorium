<?php

namespace App\Models;

use App\Models\Barang;
use App\Models\Petugas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Perbaikan extends Model
{
    use HasFactory;

    protected $table = 'perbaikans';

    protected $fillable = [
        'barang_id',
        'petugas_id',
        'tanggal_lapor',
        'kerusakan',
        'status',
        'tindakan',
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }

    public function petugas()
    {
        return $this->belongsTo(Petugas::class, 'petugas_id');
    }
}
