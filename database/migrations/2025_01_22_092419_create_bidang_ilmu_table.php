<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bidang_ilmu', function (Blueprint $table) {
            $table->uuid('id_bidang_ilmu')->unique();
            $table->string('nama_bidang_ilmu');
            $table->string('jenjang');
            $table->uuid('id_kampus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bidang_ilmu');
    }
};
