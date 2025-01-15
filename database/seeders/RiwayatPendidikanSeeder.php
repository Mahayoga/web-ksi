<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\RiwayatPendidikanModel;

class RiwayatPendidikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RiwayatPendidikanModel::create([
            'id_riwayat' => '6a2079fd-b1bf-11ef-9fcd-763fda8715d5',
            'nama_perguruan_tinggi' => 'Universitas Negeri Malang',
            'bidang_ilmu' => 'Teknik Informatika',
            'tahun_masuk' => '2010',
            'tahun_lulus' => '2014',
            'lulusan' => 'S1',
            'id_penelitian' => '93f5b7e6-b4ef-11ef-95f9-5ac3c48e79b2',
            'id_staff_pembimbing' => '15edb34c-b4ef-11ef-95f9-5ac3c48e79b2',
            'id_staff_pemilik' => 'd196be94-b1be-11ef-9fcd-763fda8715d5',
        ]);
    }
}
