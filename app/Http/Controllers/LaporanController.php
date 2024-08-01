<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function Ekuitas()
    {
        return view('admin.Ekuitas');
    }
    public function LabaRugi()
    {
        return view('admin.LabaRugi');
    }
}
