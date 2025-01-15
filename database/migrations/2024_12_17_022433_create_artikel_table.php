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
        Schema::create('artikel', function (Blueprint $table) {
            $table->uuid("id_artikel")->primary();
            $table->string("judul_artikel");
            $table->string("nama_jurnal");
            $table->string("tahun");
            $table->string("volume_nomor");
            $table->string("link_artikel");
            $table->uuid("id_staff");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artikel');
    }
};
