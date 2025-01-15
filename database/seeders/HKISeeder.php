<?php

namespace Database\Seeders;

use App\Models\HKIModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HKISeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HKIModel::create([
            'id_hki' => '7c0c1394-c0cb-11ef-ac73-9ade8914c7ab',
            'judul_hki' => 'Proposal Penelitian Pengembangan Perangkat Realtime Surface Modeling Vehicle Untuk Tambak Udang Dengan Metode Neural Network',
            'tanggal' => '2021-10-12',
            'jenis' => 'Hak Cipta',
            'nomor_p' => '000284546',
            'nomor_id' => 'EC00202154258',
            'link_hki' => 'https://pdki-indonesia.dgip.go.id/detail/EC00202154258?type=copyright&keyword=000284546',
            'id_staff' => 'd196be94-b1be-11ef-9fcd-763fda8715d5'
        ]);
    }
}
