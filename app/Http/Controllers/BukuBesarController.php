<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BukuBesarController extends Controller
{
    public function BukuBesar()
    {
        return view('admin.BukuBesar');
    }
}
