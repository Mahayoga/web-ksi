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
        Schema::create('buku', function (Blueprint $table) {
            $table->uuid('id_buku')->primary();
            $table->string('judul_buku');
            $table->string('tahun');
            $table->integer('jumlah_halaman');
            $table->string('penerbit');
            $table->string('isbn')->unique();
            $table->uuid('id_staff');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buku');
    }
};
