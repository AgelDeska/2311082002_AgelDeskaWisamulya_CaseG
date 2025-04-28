<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaryawansTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('karyawans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_karyawan');
            $table->string('bidang_keahlian');
            $table->string('email')->unique();
            $table->string('nomor_telepon');
            $table->date('tanggal_mulai');
            $table->integer('durasi_kontrak');
            $table->enum('status', ['aktif', 'tidak aktif', 'selesai']);
            $table->softDeletes(); // untuk soft delete
            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawans');
    }
}
