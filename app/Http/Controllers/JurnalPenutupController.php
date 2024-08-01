<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JurnalPenutupController extends Controller
{
    public function JurnalPenutup()
    {
        return view('admin.JurnalPenutup');
    }
}
