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
        DB::unprepared('ALTER TABLE staff ADD gelar_depan VARCHAR(255) NOT NULL AFTER nama_lengkap');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // 
    }
};
