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
        Schema::create('hki', function (Blueprint $table) {
            $table->uuid('id_hki')->primary();
            $table->string('judul_hki');
            $table->date('tanggal');
            $table->string('jenis');
            $table->string('nomor_p');
            $table->string('nomor_id');
            $table->string('link_hki');
            $table->uuid('id_staff');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hki');
    }
};
