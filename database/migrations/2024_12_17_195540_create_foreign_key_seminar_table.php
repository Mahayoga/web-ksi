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
        DB::unprepared("ALTER TABLE seminar ADD FOREIGN KEY (id_staff) REFERENCES staff (id_staff)");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // 
    }
};
