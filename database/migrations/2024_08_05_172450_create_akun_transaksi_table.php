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
        Schema::create('akunTransaksi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kelompok_akun_id')->constrained('kelompok_akun')->onUpdate('cascade')->onDelete('cascade');
            $table->string('kode', 4)->unique();
            $table->string('nama', 128);
            $table->boolean('post_saldo');
            $table->boolean('post_penyesuaian');
            $table->boolean('post_laporan');
            $table->boolean('kelompok_laporan_posisi_keuangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('akun_transaksi');
    }
};
