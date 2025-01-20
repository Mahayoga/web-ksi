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
            'id' => DB::select('SELECT UUID() as UUID')[0]->UUID,
            'name' => 'Mahayoga',
            'email' => 'myoga.bahtiar@gmail.com',
            'password' => password_hash('admin1234', PASSWORD_BCRYPT, ['cost' => 12]),
            'id_staff' => '15edb34c-b4ef-11ef-95f9-5ac3c48e79b2'
        ]);
    }
}
