<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\BarangSeeder;
use Database\Seeders\PetugasSeeder;
use Database\Seeders\PerbaikanSeeder;
use Database\Seeders\PeminjamanSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PetugasSeeder::class,
            BarangSeeder::class,
            PeminjamanSeeder::class,
            PerbaikanSeeder::class,
        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
