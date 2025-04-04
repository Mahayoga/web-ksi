<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\UserModel;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserModel::create([
            'id' => null,
            'name' => 'Mahayoga',
            'email' => 'myoga.bahtiar@polije.ac.id',
            'password' => password_hash('admin1234', PASSWORD_BCRYPT, ['cost' => 12]),
            'role' => 'admin',
            'id_staff' => '15edb34c-b4ef-11ef-95f9-5ac3c48e79b2'
        ]);
        UserModel::create([
            'id' => null,
            'name' => 'Khafidurrohman',
            'email' => 'khafid@polije.ac.id',
            'password' => password_hash('admin1234', PASSWORD_BCRYPT, ['cost' => 12]),
            'role' => 'staff',
            'id_staff' => 'd196be94-b1be-11ef-9fcd-763fda8715d5'
        ]);
        UserModel::create([
            'id' => null,
            'name' => 'Denny',
            'email' => 'denny@polije.ac.id',
            'password' => password_hash('admin1234', PASSWORD_BCRYPT, ['cost' => 12]),
            'role' => 'staff',
            'id_staff' => 'ecd09a5a-e14a-11ef-a4d9-847eec23e929'
        ]);
    }
}
