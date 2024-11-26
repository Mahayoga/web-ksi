<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\KantorModel;
use Illuminate\Support\Facades\DB;

class KantorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KantorModel::create([
            'id_kantor' => 'd4c945f3-abc1-11ef-80d9-d4dedcb2e874',
            'nama_kantor' => 'Laboratorium Komputasi Sistem Informasi',
            'alamat_kantor' => 'Jl. Mastrip PO BOX 164 Jember',
            'id_kampus' => '5929fea7-abc2-11ef-80d9-d4dedcb2e874',
        ]);
    }
}
