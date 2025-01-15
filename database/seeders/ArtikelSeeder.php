<?php

namespace Database\Seeders;

use App\Models\ArtikelModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArtikelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ArtikelModel::create([
            "id_artikel" => "27fc948f-bc20-11ef-9f62-753ac32671c7",
            "judul_artikel" => "Developing Automatic Student Motivation Modeling System",
            "nama_jurnal" => "OP Conf. Series: Journal of Physics",
            "tahun" => "2018",
            "volume_nomor" => "Conf. Series 953 (2018) 012114 doi: 10.1088/1742-6596/953/1/012114",
            "link_artikel" => "https://iopscience.iop.org/article/10.1088/1742-6596/953/1/012114/pdf",
            "id_staff" => "d196be94-b1be-11ef-9fcd-763fda8715d5"
        ]);
    }
}
