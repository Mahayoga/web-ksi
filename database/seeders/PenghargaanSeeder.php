<?php

namespace Database\Seeders;

use App\Models\PenghargaanModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenghargaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PenghargaanModel::create([
            'id_penghargaan' => '2d576174-c0cc-11ef-ac73-9ade8914c7ab',
            'jenis_penghargaan' => 'Prestasi Akademik',
            'pemberi' => 'UGM',
            'penghargaan' => 'Lulusan Cumloude',
            'tahun' => '2015',
            'id_staff' => 'd196be94-b1be-11ef-9fcd-763fda8715d5',
        ]);
    }
}
