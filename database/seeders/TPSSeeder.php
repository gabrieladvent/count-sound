<?php

namespace Database\Seeders;

use App\Models\Suara;
use App\Models\TPS;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TPSSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=1; $i <= 6; $i++) { TPS::create(['nomor_tps' => $i, 'id_desa' => 1]);}
        for ($i=1; $i <= 4; $i++) { TPS::create(['nomor_tps' => $i, 'id_desa' => 2]);}
        for ($i=1; $i <= 5; $i++) { TPS::create(['nomor_tps' => $i, 'id_desa' => 3]);}
        for ($i=1; $i <= 4; $i++) { TPS::create(['nomor_tps' => $i, 'id_desa' => 4]);}
        for ($i=1; $i <= 6; $i++) { TPS::create(['nomor_tps' => $i, 'id_desa' => 5]);}
        for ($i=1; $i <= 5; $i++) { TPS::create(['nomor_tps' => $i, 'id_desa' => 6]);}
        for ($i=1; $i <= 2; $i++) { TPS::create(['nomor_tps' => $i, 'id_desa' => 7]);}
        for ($i=1; $i <= 3; $i++) { TPS::create(['nomor_tps' => $i, 'id_desa' => 8]);}

        for ($i=1; $i <= 1; $i++) { TPS::create(['nomor_tps' => $i, 'id_desa' => 1]);}
        for ($i=1; $i <= 4; $i++) { TPS::create(['nomor_tps' => $i, 'id_desa' => 2]);}
        for ($i=1; $i <= 6; $i++) { TPS::create(['nomor_tps' => $i, 'id_desa' => 3]);}
        for ($i=1; $i <= 2; $i++) { TPS::create(['nomor_tps' => $i, 'id_desa' => 4]);}
        for ($i=1; $i <= 4; $i++) { TPS::create(['nomor_tps' => $i, 'id_desa' => 5]);}
        for ($i=1; $i <= 5; $i++) { TPS::create(['nomor_tps' => $i, 'id_desa' => 6]);}
        for ($i=1; $i <= 4; $i++) { TPS::create(['nomor_tps' => $i, 'id_desa' => 7]);}
        for ($i=1; $i <= 2; $i++) { TPS::create(['nomor_tps' => $i, 'id_desa' => 8]);}
        for ($i=1; $i <= 4; $i++) { TPS::create(['nomor_tps' => $i, 'id_desa' => 9]);}
        for ($i=1; $i <= 2; $i++) { TPS::create(['nomor_tps' => $i, 'id_desa' => 10]);}
        for ($i=1; $i <= 2; $i++) { TPS::create(['nomor_tps' => $i, 'id_desa' => 11]);}
        for ($i=1; $i <= 4; $i++) { TPS::create(['nomor_tps' => $i, 'id_desa' => 12]);}
        for ($i=1; $i <= 1; $i++) { TPS::create(['nomor_tps' => $i, 'id_desa' => 13]);}
        for ($i=1; $i <= 2; $i++) { TPS::create(['nomor_tps' => $i, 'id_desa' => 14]);}
        for ($i=1; $i <= 1; $i++) { TPS::create(['nomor_tps' => $i, 'id_desa' => 15]);}
        for ($i=1; $i <= 1; $i++) { TPS::create(['nomor_tps' => $i, 'id_desa' => 16]);}

        for ($i=1; $i <= 4; $i++) { TPS::create(['nomor_tps' => $i, 'id_desa' => 1]);}
        for ($i=1; $i <= 6; $i++) { TPS::create(['nomor_tps' => $i, 'id_desa' => 2]);}
        for ($i=1; $i <= 4; $i++) { TPS::create(['nomor_tps' => $i, 'id_desa' => 3]);}
        for ($i=1; $i <= 4; $i++) { TPS::create(['nomor_tps' => $i, 'id_desa' => 4]);}
        for ($i=1; $i <= 6; $i++) { TPS::create(['nomor_tps' => $i, 'id_desa' => 5]);}
        for ($i=1; $i <= 3; $i++) { TPS::create(['nomor_tps' => $i, 'id_desa' => 6]);}
        for ($i=1; $i <= 2; $i++) { TPS::create(['nomor_tps' => $i, 'id_desa' => 7]);}

    }
}