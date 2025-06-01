<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PeminjamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('peminjamans')->insert([
            'barang_id' => 1,
            'petugas_id' => 1,
            'nama_peminjam' => 'Andini Istiqomah',
            'npm' => 'G1F023016',
            'jumlah' => 1,
            'tanggal_pinjam' => '2025-05-30',
            'tanggal_kembali' => '2025-06-03',
            'tanggal_dikembalikan' => null,
            'status' => 'Dipinjam',
            'catatan' => 'Untuk keperluan praktikum Jaringan Komputer',
        ]);
    }
}
