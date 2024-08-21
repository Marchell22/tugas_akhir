<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RencanaAnggaranBiaya extends Model
{
    use HasFactory;
    protected $table    = 'rencana_anggaran_biayas';
    protected $fillable = [
        'bidang',
        'kegiatan',
        'waktu_pelaksanaan',
        'output',
        'uraian_pekerjaan'
    ];

    protected $casts = [
        'uraian_pekerjaan' => 'array',
    ];
}
