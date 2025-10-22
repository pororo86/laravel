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
        Schema::create('jadwals', function (Blueprint $table) {
            $table->id();
            $table->string('kode_mk')->unique(); 
            $table->string('nama_mk');
            $table->string('dosen');
            $table->string('gambar')->nullable();
            $table->string('kelas');
            $table->string('hari');
            $table->string('jam');
            $table->date('tanggal_mulai');
            $table->date('tanggal_akhir');
            $table->string('kelompok')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwals');
    }
};
