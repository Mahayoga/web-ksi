<?php

namespace Database\Seeders;

use App\Models\JabatanModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Jabatan 	                    Pangkat 	            Golongan 	Angka kredit
        // Asisten Ahli 	            Penata Muda 	        III/a 	    100
        //                              Penata Muda Tk. I 	    III/b 	    150
        // Lektor 	                    Penata 	                III/c 	    200
        //                              Penata Tk.I 	        III/d 	    300
        // Lektor Kepala 	            Pembina 	            IV/a 	    400
        //                              Pembina Tk. I 	        IV/b 	    550
        //                              Pembina Utama Muda 	    IV/c 	    700
        // Guru Besar atau Profesor 	Pembina Utama Madya 	IV/d 	    850
        //                              Pembina Utama 	        IV/e 	    1050

        JabatanModel::create([
            'id_jabatan' => 'af0bd727-e700-11ef-b357-ad35fe5edb30',
            'nama_jabatan' => 'Asisten Ahli',
        ]);
        JabatanModel::create([
            'id_jabatan' => 'c28a93fe-e700-11ef-b357-ad35fe5edb30',
            'nama_jabatan' => 'Lektor',
        ]);
        JabatanModel::create([
            'id_jabatan' => 'c6effbd6-e700-11ef-b357-ad35fe5edb30',
            'nama_jabatan' => 'Lektor Kepala',
        ]);
        JabatanModel::create([
            'id_jabatan' => 'cb4b2fdd-e700-11ef-b357-ad35fe5edb30',
            'nama_jabatan' => 'Guru Besar atau Profesor',
        ]);
    }
}
