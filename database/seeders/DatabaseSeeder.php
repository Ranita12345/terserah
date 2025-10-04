<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User default (cek dulu kalau sudah ada tidak dibuat ulang)
        User::firstOrCreate(
            ['email' => 'test@example.com'], // cek email dulu
            [
                'name' => 'Test User',
                'password' => bcrypt('password'), // jangan lupa password
            ]
        );

        // Tambahkan Seeder Footer (kalau sudah ada file FooterSeeder)
        $this->call([
            FooterSeeder::class,
        ]);
    }
}
