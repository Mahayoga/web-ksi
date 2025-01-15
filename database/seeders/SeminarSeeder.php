<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SeminarModel;

class SeminarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SeminarModel::create([
            'id_seminar' => '14356760-bc7f-11ef-9f62-753ac32671c7',
            'nama_pertemuan' => 'Seminar Nasional Teknologi Informasi dan MultimediaSeminar Nasional Teknologi Informasi dan Multimedia',
            'judul_seminar' => 'Perancangan Blended E-Learning Berbasis Problem-Based Learning untuk Mendukung Adaptive Learning',
            'tahun' => '2015',
            'tempat' => 'Yogyakarta',
            'link_seminar' => 'https://ojs.amikom.ac.id/1026/988',
            'id_staff' => 'd196be94-b1be-11ef-9fcd-763fda8715d5',
        
        ]);
    }
}
