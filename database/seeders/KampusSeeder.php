<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\KampusModel;
use Illuminate\Support\Facades\DB;

class KampusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KampusModel::create([
            'id_kampus' => '5929fea7-abc2-11ef-80d9-d4dedcb2e874',
            'nama_kampus' => 'Politeknik Negeri Jember',
        ]);
    }
}
