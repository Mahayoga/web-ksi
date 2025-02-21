<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared('ALTER TABLE staff CHANGE gelar_depan gelar_depan VARCHAR(255) NULL');
        DB::unprepared('ALTER TABLE staff CHANGE gelar_belakang gelar_belakang VARCHAR(255) NULL');
        DB::unprepared('ALTER TABLE staff CHANGE id_pangkat id_pangkat CHAR(36) NULL');
        DB::unprepared('ALTER TABLE staff CHANGE NIP NIP VARCHAR(255) NULL');
        DB::unprepared('ALTER TABLE staff CHANGE NIDN NIDN VARCHAR(255) NULL');
        DB::unprepared('ALTER TABLE staff CHANGE tempat_lahir tempat_lahir VARCHAR(255) NULL');
        DB::unprepared('ALTER TABLE staff CHANGE tanggal_lahir tanggal_lahir DATE NULL');
        DB::unprepared('ALTER TABLE staff CHANGE nomor_telepon nomor_telepon VARCHAR(255) NULL');
        DB::unprepared('ALTER TABLE staff CHANGE fax fax VARCHAR(255) NULL');
        DB::unprepared('ALTER TABLE staff CHANGE alamat alamat VARCHAR(255) NULL');
        DB::unprepared('ALTER TABLE staff CHANGE deskripsi deskripsi TEXT NULL');
        DB::unprepared('ALTER TABLE staff CHANGE tempat_lahir tempat_lahir VARCHAR(255) NULL');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // 
    }
};
