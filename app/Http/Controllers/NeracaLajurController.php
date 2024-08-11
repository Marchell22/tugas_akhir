<?php

namespace App\Http\Controllers;

use App\Models\AkunTransaksi;
use Illuminate\Http\Request;

class NeracaLajurController extends Controller
{
    public function NeracaLajur()
    {
        $data = AkunTransaksi::orderBy('kode', 'asc')->get();
        return view('admin.NeracaLajur', compact('data'));
    }
}
