<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PerbaikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('perbaikans')->insert([
            'barang_id' => 3,
            'petugas_id' => 1,
            'tanggal_lapor' => '2025-06-01',
            'kerusakan' => 'Tidak bisa menyala meskipun sudah di-charge',
            'status' => 'Dilaporkan',
            'tindakan' => null,
        ]);
    }
}
