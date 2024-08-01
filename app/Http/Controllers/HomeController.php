<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function AkunTransaksi(){
              return view('admin.AkunTransaksi');
    }
    public function landingUser(){
              return view('pegawai.landingUser');
    }
}
