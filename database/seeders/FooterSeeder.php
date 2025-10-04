<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FooterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cegah duplikasi: hanya insert jika tabel kosong
        if (DB::table('footers')->count() === 0) {
            DB::table('footers')->insert([
                'image' => 'default.png',
                'link_instagram' => '#',
                'link_youtube' => '#',
                'link_facebook' => '#',
                'alamat' => 'Alamat Sekolah',
                'email' => 'email@sekolah.com',
                'wa' => '08123456789',
                'link_gmaps' => '#',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
