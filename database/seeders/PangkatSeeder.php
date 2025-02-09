<?php

namespace Database\Seeders;

use App\Models\PangkatModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PangkatSeeder extends Seeder
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

        PangkatModel::create([
            'id_pangkat' => '4a2a2fb9-e701-11ef-b357-ad35fe5edb30',
            'nama_pangkat' => 'Penata Muda',
            'golongan' => 'III/a',
            'angka_kredit' => '100',
            'id_jabatan' => 'af0bd727-e700-11ef-b357-ad35fe5edb30'
        ]);
        PangkatModel::create([
            'id_pangkat' => '76069f11-e701-11ef-b357-ad35fe5edb30',
            'nama_pangkat' => 'Penata Muda Tk. I',
            'golongan' => 'III/b',
            'angka_kredit' => '150',
            'id_jabatan' => 'af0bd727-e700-11ef-b357-ad35fe5edb30'
        ]);

        PangkatModel::create([
            'id_pangkat' => '7dcc3a66-e701-11ef-b357-ad35fe5edb30',
            'nama_pangkat' => 'Penata',
            'golongan' => 'III/c',
            'angka_kredit' => '200',
            'id_jabatan' => 'c28a93fe-e700-11ef-b357-ad35fe5edb30'
        ]);
        PangkatModel::create([
            'id_pangkat' => '82fa496d-e701-11ef-b357-ad35fe5edb30',
            'nama_pangkat' => 'Penata Tk.I',
            'golongan' => 'III/d',
            'angka_kredit' => '300',
            'id_jabatan' => 'c28a93fe-e700-11ef-b357-ad35fe5edb30'
        ]);

        PangkatModel::create([
            'id_pangkat' => '86fb04c2-e701-11ef-b357-ad35fe5edb30',
            'nama_pangkat' => 'Pembina',
            'golongan' => 'IV/a',
            'angka_kredit' => '400',
            'id_jabatan' => 'c6effbd6-e700-11ef-b357-ad35fe5edb30'
        ]);
        PangkatModel::create([
            'id_pangkat' => '8beee010-e701-11ef-b357-ad35fe5edb30',
            'nama_pangkat' => 'Pembina Tk. I',
            'golongan' => 'IV/b',
            'angka_kredit' => '550',
            'id_jabatan' => 'c6effbd6-e700-11ef-b357-ad35fe5edb30'
        ]);
        PangkatModel::create([
            'id_pangkat' => '920fa97f-e701-11ef-b357-ad35fe5edb30',
            'nama_pangkat' => 'Pembina Utama Muda',
            'golongan' => 'IV/c',
            'angka_kredit' => '700',
            'id_jabatan' => 'c6effbd6-e700-11ef-b357-ad35fe5edb30'
        ]);

        PangkatModel::create([
            'id_pangkat' => '9a6ac22a-e701-11ef-b357-ad35fe5edb30',
            'nama_pangkat' => 'Pembina Utama Madya',
            'golongan' => 'IV/d',
            'angka_kredit' => '850',
            'id_jabatan' => 'cb4b2fdd-e700-11ef-b357-ad35fe5edb30'
        ]);
        PangkatModel::create([
            'id_pangkat' => 'a1e52a2e-e701-11ef-b357-ad35fe5edb30',
            'nama_pangkat' => 'Pembina Utama',
            'golongan' => 'IV/e',
            'angka_kredit' => '1050',
            'id_jabatan' => 'cb4b2fdd-e700-11ef-b357-ad35fe5edb30'
        ]);
    }
}
