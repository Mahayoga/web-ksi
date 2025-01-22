<?php

namespace Database\Seeders;

use App\Models\BidangIlmuModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BidangIlmuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BidangIlmuModel::create([
            'id_bidang_ilmu' => 'b62575c4-d863-11ef-a5d6-878b220acde3',
            'nama_bidang_ilmu' => 'Teknik Informatika',
            'jenjang' => 'S1',
            'id_kampus' => '5929fea7-abc2-11ef-80d9-d4dedcb2e875',
        ]);
    }
}
