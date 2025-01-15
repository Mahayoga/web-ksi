<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PengabdianModel;

class PengabdianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PengabdianModel::create([
            "id_pengabdian" => "9c345391-bc19-11ef-9f62-753ac32671c7",
            "judul_pengabdian" => "Pelatihan Pembuatan Papan Sistem Minimum Mikrokontroler Berbasis Arduino sebagai Pendukung Kurikulum 2013 Di SMKN 2 Jember",
            "tahun" => "2017",
            "sumber_pendanaan" => "BOPTN 2017 Politeknik Negeri Jember",
            "id_staff" => "d196be94-b1be-11ef-9fcd-763fda8715d5",
        ]);
    }
}
