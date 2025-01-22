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
            'id_kampus' => '5929fea7-abc2-11ef-80d9-d4dedcb2e875',
            'id_bidang_ilmu' => 'b62575c4-d863-11ef-a5d6-878b220acde3',
            'tahun_masuk' => '2010',
            'tahun_lulus' => '2014',
            'lulusan' => 'S1',
            'id_penelitian' => '93f5b7e6-b4ef-11ef-95f9-5ac3c48e79b2',
            'id_staff_pembimbing' => '15edb34c-b4ef-11ef-95f9-5ac3c48e79b2',
            'id_staff_pemilik' => 'd196be94-b1be-11ef-9fcd-763fda8715d5',
        ]);
    }
}
