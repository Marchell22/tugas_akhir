<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AkunPenggunaController extends Controller
{
    public function AkunPengguna()
    {
        return view('admin.AkunPengguna');
    }
}
