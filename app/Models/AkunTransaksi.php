<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AkunTransaksi extends Model
{
    protected $table    = 'akunTransaksi';
    protected $guarded  = [];

    // public function jurnal_umum()
    // {
    //     return $this->hasMany(JurnalUmum::class);
    // }

    // public function jurnal_penyesuaian()
    // {
    //     return $this->hasMany(JurnalPenyesuaian::class);
    // }
}
