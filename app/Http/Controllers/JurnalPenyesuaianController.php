<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JurnalPenyesuaianController extends Controller
{
    public function JurnalPenyesuaian()
    {
        return view('admin.JurnalPenyesuaian');
    }
    public function ValidasiJurnalPenyesuaian()
    {
        return view('admin.ValidasiJurnalPenyesuaian');
    }
}
