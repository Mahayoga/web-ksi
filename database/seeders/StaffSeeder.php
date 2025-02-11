<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\StaffModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StaffModel::create([
            'id_staff' => 'd196be94-b1be-11ef-9fcd-763fda8715d5',
            'nama_lengkap' => 'Khafidurrohman Agustianto',
            'gelar_depan' => '',
            'gelar_belakang' => 'S.Pd., M.Eng.',
            'jenis_kelamin' => 'l',
            'id_pangkat' => '7dcc3a66-e701-11ef-b357-ad35fe5edb30',
            'NIP' => '199112112018031001',
            'NIDN' => '0011129102',
            'tempat_lahir' => 'Trenggalek',
            'tanggal_lahir' => '1991-12-11',
            'nomor_telepon' => '085646418027',
            'id_kantor' => 'd4c945f3-abc1-11ef-80d9-d4dedcb2e874',
            'fax' => '0331-333531',
            'alamat' => 'Jember',
            'profile_image' => 'assets/img/staff/default_profile.png'
        ]);
        StaffModel::create([
            'id_staff' => '15edb34c-b4ef-11ef-95f9-5ac3c48e79b2',
            'nama_lengkap' => 'Mahayoga Ksatria Hanafi Bahtiar',
            'gelar_depan' => '',
            'gelar_belakang' => 'A.Md. Kom',
            'jenis_kelamin' => 'l',
            'id_pangkat' => '4a2a2fb9-e701-11ef-b357-ad35fe5edb30',
            'NIP' => '199112112018031002',
            'NIDN' => '0011129103',
            'tempat_lahir' => 'Probolinggo',
            'tanggal_lahir' => '2005-08-30',
            'nomor_telepon' => '082337341446',
            'id_kantor' => 'd4c945f3-abc1-11ef-80d9-d4dedcb2e874',
            'fax' => '0331-333531',
            'alamat' => 'Probolinggo',
            'profile_image' => 'assets/img/staff/default_profile.png'
        ]);
        StaffModel::create([
            'id_staff' => 'ecd09a5a-e14a-11ef-a4d9-847eec23e929',
            'nama_lengkap' => 'Denny Trias Utomo',
            'gelar_depan' => 'Dr.',
            'gelar_belakang' => 'S.Si, MT',
            'jenis_kelamin' => 'l',
            'id_pangkat' => '9a6ac22a-e701-11ef-b357-ad35fe5edb30',
            'NIP' => '197110092003121001',
            'NIDN' => '0009107104',
            'tempat_lahir' => 'Malang',
            'tanggal_lahir' => '1971-10-09',
            'nomor_telepon' => '081336608000',
            'id_kantor' => 'd4c945f3-abc1-11ef-80d9-d4dedcb2e874',
            'fax' => '-',
            'alamat' => 'Probolinggo',
            'profile_image' => 'assets/img/staff/default_profile.png'
        ]);
    }
}
