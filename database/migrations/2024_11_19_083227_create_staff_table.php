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
        Schema::create('staff', function (Blueprint $table) {
            $table->uuid('id_staff')->unique();
            $table->string('nama_lengkap');
            $table->string('gelar');
            $table->enum('jenis_kelamin', ['l', 'p']);
            $table->string('jabatan_fungsional');
            $table->string('NIP')->unique();
            $table->string('NIDN')->unique();
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('email_staff')->unique();
            $table->string('nomor_telepon');
            $table->string('fax');
            $table->uuid('id_kantor');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};
