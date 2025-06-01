<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PetugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('petugas')->insert([
            'nama_lengkap' => 'Keisha Azzahra Anindya',
            'email' => 'kei@labsi.ac.id',
            'password' => Hash::make('123'),
            'nomor_telepon' => '081234567890',
        ]);
    }
}
