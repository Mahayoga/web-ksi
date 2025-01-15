<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PenelitianModel;

class PenelitianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PenelitianModel::create([
            'id_penelitian' => '93f5b7e6-b4ef-11ef-95f9-5ac3c48e79b2',
            'judul_penelitian' => 'Perancangan Blended E-Learning Berbasis Problem-Based Learning untuk Mendukung Adaptive Learning',
            'sumber_pendanaan' => 'Mandiri',
            'tahun_penelitian' => '2015',
            'id_staff' => 'd196be94-b1be-11ef-9fcd-763fda8715d5'
        ]);
    }
}
