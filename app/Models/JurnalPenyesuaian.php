<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JurnalPenyesuaian extends Model
{
    use HasFactory;
    protected $table    = 'jurnal_penyesuaian';
    protected $fillable = [
        'akun_id',
        'tanggal',
        'keterangan',
        'bukti',
        'debit_atau_kredit',
        'nilai',
        'status'
    ];
    public function akuntransaksi()
    {
        return $this->belongsTo(AkunTransaksi::class, 'akun_id');
    }
}
