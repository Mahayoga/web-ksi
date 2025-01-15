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
        Schema::create('seminar', function (Blueprint $table) {
            $table->uuid('id_seminar')->primary();
            $table->string('nama_pertemuan');
            $table->string('judul_seminar');
            $table->string('tahun');
            $table->string('tempat');
            $table->string('link_seminar');
            $table->uuid('id_staff');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seminar');
    }
};
