<?php

namespace Database\Seeders;

use App\Models\BukuModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BukuModel::create([
            'id_buku' => 'b1046361-c0c6-11ef-ac73-9ade8914c7ab',
            'judul_buku' => 'Communications in Computer and Information Science: Eye Gaze Based Model for Anxiety Detection of Engineering Students',
            'tahun' => '2022',
            'jumlah_halaman' => '195',
            'penerbit' => 'Springer Nature, Switzerland',
            'isbn' => '18650929',
            'id_staff' => 'd196be94-b1be-11ef-9fcd-763fda8715d5'
        ]);
    }
}
