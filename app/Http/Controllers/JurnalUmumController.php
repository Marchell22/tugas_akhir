<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JurnalUmumController extends Controller
{
    public function JurnalUmum()
    {
        return view('admin.JurnalUmum');
    }
    public function ValidasiJurnalUmum()
    {
        return view('admin.ValidasiJurnalUmum');
    }
}
