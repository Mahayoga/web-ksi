<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(UserSeeder::class);
        $this->call(KampusSeeder::class);
        $this->call(KantorSeeder::class);
        $this->call(StaffSeeder::class);
        $this->call(PenelitianSeeder::class);
        $this->call(RiwayatPendidikanSeeder::class);
        $this->call(PengabdianSeeder::class);
        $this->call(ArtikelSeeder::class);
        $this->call(SeminarSeeder::class);
        $this->call(BukuSeeder::class);
        $this->call(HKISeeder::class);
        $this->call(PenghargaanSeeder::class);
    }
}
