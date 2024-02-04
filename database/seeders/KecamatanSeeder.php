<?php

namespace Database\Seeders;

use App\Models\Kecamatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kecamatan::create(['nama_kecamatan' => 'Ile Mandiri']);
        Kecamatan::create(['nama_kecamatan' => 'Tanjung Bunga']);
        Kecamatan::create(['nama_kecamatan' => 'Lewolema']);
        
    }
}
