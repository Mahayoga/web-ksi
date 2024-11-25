<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\StaffModel;
use Illuminate\Support\Facades\DB;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StaffModel::create([
            'id_staff' => DB::select('SELECT UUID() as hehe')[0]->hehe,
            'nama_lengkap' => 'Khafidurrohman Agustianto',
            'gelar' => ' S.Pd., M.Eng.',
            'jenis_kelamin' => 'l',
            'jabatan_fungsional' => 'Lektor/IIIc',
            'NIP' => '199112112018031001',
            'NIDN' => '0011129102',
            'tempat_lahir' => 'Trenggalek',
            'tanggal_lahir' => '1991-12-11',
            'email_staff' => 'khafid@polije.ac.id',
            'nomor_telepon' => '085646418027',
            'alamat_kantor' => 'Jl. Mastrip PO BOX 164 Jember',
            'fax' => '0331-333531',
        ]);
    }
}
