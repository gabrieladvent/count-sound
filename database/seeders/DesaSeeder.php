<?php

namespace Database\Seeders;

use App\Models\Desa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Desa::create(['nama_desa' => 'Wailolong', 'id_kecamatan' => '1', 'jumlah_tps' => 6]);
        Desa::create(['nama_desa' => 'Lewoloba', 'id_kecamatan' => '1', 'jumlah_tps' => 4]);
        Desa::create(['nama_desa' => 'Tiwatobi', 'id_kecamatan' => '1', 'jumlah_tps' => 5]);
        Desa::create(['nama_desa' => 'Watotutu', 'id_kecamatan' => '1', 'jumlah_tps' => 4]);
        Desa::create(['nama_desa' => 'Riangkemie', 'id_kecamatan' => '1', 'jumlah_tps' => 6]);
        Desa::create(['nama_desa' => 'Lewohala', 'id_kecamatan' => '1', 'jumlah_tps' => 5]);
        Desa::create(['nama_desa' => 'Halakodanuan', 'id_kecamatan' => '1', 'jumlah_tps' => 2]);
        Desa::create(['nama_desa' => 'Mudakeputu', 'id_kecamatan' => '1', 'jumlah_tps' => 3]);

        Desa::create(['nama_desa' => 'Lewobunga', 'id_kecamatan' => '2', 'jumlah_tps' => 1]);
        Desa::create(['nama_desa' => 'Sinamalaka', 'id_kecamatan' => '2', 'jumlah_tps' => 4]);
        Desa::create(['nama_desa' => 'Ratulodong', 'id_kecamatan' => '2', 'jumlah_tps' => 6]);
        Desa::create(['nama_desa' => 'Sinar Hadigala', 'id_kecamatan' => '2', 'jumlah_tps' => 2]);
        Desa::create(['nama_desa' => 'Bahinga', 'id_kecamatan' => '2', 'jumlah_tps' => 4]);
        Desa::create(['nama_desa' => 'Waibao', 'id_kecamatan' => '2', 'jumlah_tps' => 5]);
        Desa::create(['nama_desa' => 'Lamatutu', 'id_kecamatan' => '2', 'jumlah_tps' => 4]);
        Desa::create(['nama_desa' => 'Laton Liwo', 'id_kecamatan' => '2', 'jumlah_tps' => 2]);
        Desa::create(['nama_desa' => 'Kolaka', 'id_kecamatan' => '2', 'jumlah_tps' => 4]);
        Desa::create(['nama_desa' => 'Bandona', 'id_kecamatan' => '2', 'jumlah_tps' => 2]);
        Desa::create(['nama_desa' => 'Nusa Nipa', 'id_kecamatan' => '2', 'jumlah_tps' => 2]);
        Desa::create(['nama_desa' => 'Patisirawalang', 'id_kecamatan' => '2', 'jumlah_tps' => 4]);
        Desa::create(['nama_desa' => 'Gekeng Deran', 'id_kecamatan' => '2', 'jumlah_tps' => 1]);
        Desa::create(['nama_desa' => 'Aransina', 'id_kecamatan' => '2', 'jumlah_tps' => 2]);
        Desa::create(['nama_desa' => 'Laton Liwo II', 'id_kecamatan' => '2', 'jumlah_tps' => 1]);
        Desa::create(['nama_desa' => 'Lamanabi', 'id_kecamatan' => '2', 'jumlah_tps' => 1]);

        Desa::create(['nama_desa' => 'Ile Padung', 'id_kecamatan' => '3', 'jumlah_tps' => 4]);
        Desa::create(['nama_desa' => 'Bantala', 'id_kecamatan' => '3', 'jumlah_tps' => 6]);
        Desa::create(['nama_desa' => 'Sinar Hading', 'id_kecamatan' => '3', 'jumlah_tps' => 4]);
        Desa::create(['nama_desa' => 'Painapang', 'id_kecamatan' => '3', 'jumlah_tps' => 4]);
        Desa::create(['nama_desa' => 'Balukhering', 'id_kecamatan' => '3', 'jumlah_tps' => 6]);
        Desa::create(['nama_desa' => 'Riangkotek', 'id_kecamatan' => '3', 'jumlah_tps' => 3]);
        Desa::create(['nama_desa' => 'Lewobele', 'id_kecamatan' => '3', 'jumlah_tps' => 2]);

    }
}