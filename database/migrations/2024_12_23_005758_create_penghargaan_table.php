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
        Schema::create('penghargaan', function (Blueprint $table) {
            $table->uuid('id_penghargaan')->primary();
            $table->string('jenis_penghargaan');
            $table->string('pemberi');
            $table->string('penghargaan');
            $table->string('tahun');
            $table->uuid('id_staff');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penghargaan');
    }
};
