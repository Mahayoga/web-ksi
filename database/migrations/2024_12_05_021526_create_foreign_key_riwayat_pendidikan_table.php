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
        DB::unprepared('ALTER TABLE riwayat_pendidikan ADD FOREIGN KEY (id_penelitian) REFERENCES penelitian (id_penelitian)');
        DB::unprepared('ALTER TABLE riwayat_pendidikan ADD FOREIGN KEY (id_staff_pembimbing) REFERENCES staff (id_staff)');
        DB::unprepared('ALTER TABLE riwayat_pendidikan ADD FOREIGN KEY (id_staff_pemilik) REFERENCES staff (id_staff)');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // 
    }
};
