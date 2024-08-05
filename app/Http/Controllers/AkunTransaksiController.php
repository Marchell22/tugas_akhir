<?php

namespace App\Http\Controllers;

use App\Models\AkunTransaksi;
use Illuminate\Http\Request;

class AkunTransaksiController extends Controller
{
  public function AkunTransaksi()
  {
    $data = AkunTransaksi::get();
    return view('admin.AkunTransaksi', compact('data'));
  }
  public function ValidasiTransaksi()
  {
    return view('admin.ValidasiTransaksi');
  }
}
