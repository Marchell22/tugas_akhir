<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JurnalUmum extends Model
{
    use HasFactory;
    protected $table    = 'jurnal_umum';
    protected $fillable = [
        'akun_id',
        'tanggal',
        'keterangan',
        'bukti',
        'debit_atau_kredit',
        'nilai',
    ];
}
