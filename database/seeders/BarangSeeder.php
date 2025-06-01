<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('barangs')->insert([
            [
                'nama_barang' => 'Router Mikrotik RB750Gr3',
                'spesifikasi' => 'Routerboard dengan 5 port LAN, cocok untuk jaringan lab',
                'stok' => 3,
                'kondisi' => 'Baik',
            ],
            [
                'nama_barang' => 'Kabel LAN Cat6 10 meter',
                'spesifikasi' => 'Kabel UTP untuk koneksi antar perangkat jaringan',
                'stok' => 10,
                'kondisi' => 'Baik',
            ],
            [
                'nama_barang' => 'Laptop Dell Latitude 5490',
                'spesifikasi' => 'i5, RAM 8GB, SSD 256GB - digunakan untuk praktikum jaringan',
                'stok' => 5,
                'kondisi' => 'Rusak',
            ],
        ]);
    }
}
