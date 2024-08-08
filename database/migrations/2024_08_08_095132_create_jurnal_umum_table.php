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
        Schema::create('jurnal_umum', function (Blueprint $table) {
            $table->id();
            $table->foreignId('akun_id')->constrained('akunTransaksi')->onUpdate('cascade')->onDelete('cascade');
            $table->date('tanggal');
            $table->text('keterangan');
            $table->string('bukti', 128)->nullable();
            $table->boolean('debit_atau_kredit');
            $table->bigInteger('nilai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jurnal_umum');
    }
};
