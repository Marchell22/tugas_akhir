<?php

namespace Database\Seeders;

use App\Models\AkunTransaksi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AkunTransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AkunTransaksi::create([
            "kelompok_akun_id" => 1,
            "kode" => "1110",
            "nama" => "Kas",
            "post_saldo" => 1,
            "post_penyesuaian" => 2,
            "post_laporan" => 1,
            "kelompok_laporan_posisi_keuangan" => 1,
        ]);

        AkunTransaksi::create([
            "kelompok_akun_id" => 1,
            "kode" => "1120",
            "nama" => "Piutang",
            "post_saldo" => 1,
            "post_penyesuaian" => 2,
            "post_laporan" => 1,
            "kelompok_laporan_posisi_keuangan" => 1,
        ]);

        AkunTransaksi::create([
            "kelompok_akun_id" => 1,
            "kode" => "1130",
            "nama" => "Asuransi Dibayar Dimuka",
            "post_saldo" => 1,
            "post_penyesuaian" => 2,
            "post_laporan" => 1,
            "kelompok_laporan_posisi_keuangan" => 1,
        ]);
    }

}
