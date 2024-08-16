<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AkunTransaksi extends Model

{
    use HasFactory;
    protected $table    = 'akunTransaksi';
    protected $fillable = [
        'kelompok_akun_id',
        'kode',
        'nama' ,
        'post_saldo',
        'post_penyesuaian' ,
        'post_laporan',
        'kelompok_laporan_posisi_keuangan',
        'status'
    ];

}
