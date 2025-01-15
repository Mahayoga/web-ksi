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
        Schema::create('riwayat_pendidikan', function (Blueprint $table) {
            $table->uuid('id_riwayat')->unique();
            $table->string('nama_perguruan_tinggi');
            $table->string('bidang_ilmu');
            $table->string('tahun_masuk');
            $table->string('tahun_lulus');
            $table->enum('lulusan', ['D3', 'D4', 'S1', 'S2', 'S3']);
            $table->uuid('id_penelitian');
            $table->uuid('id_staff_pembimbing');
            $table->uuid('id_staff_pemilik');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_pendidikan');
    }
};
