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
        Schema::create('pangkat', function (Blueprint $table) {
            $table->uuid('id_pangkat')->unique();
            $table->string('nama_pangkat');
            $table->string('golongan');
            $table->string('angka_kredit');
            $table->uuid('id_jabatan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pangkat');
    }
};
