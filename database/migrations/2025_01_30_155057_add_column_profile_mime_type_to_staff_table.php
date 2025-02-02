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
        DB::unprepared('ALTER TABLE staff ADD profile_mime_type ENUM("jpg", "jpeg", "png", "webp") NOT NULL AFTER profile_image');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // 
    }
};
