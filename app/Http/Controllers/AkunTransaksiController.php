<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AkunTransaksiController extends Controller
{
    public function AkunTransaksi(){
      return view('admin.AkunTransaksi');
    }
    public function ValidasiTransaksi(){
       return view('admin.ValidasiTransaksi');
    }
}
