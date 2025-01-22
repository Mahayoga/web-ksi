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
        DB::unprepared("ALTER TABLE riwayat_pendidikan ADD FOREIGN KEY (id_kampus) REFERENCES kampus (id_kampus)");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
