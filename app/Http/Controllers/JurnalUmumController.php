<?php

namespace App\Http\Controllers;

use App\Models\JurnalUmum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class JurnalUmumController extends Controller
{
    public function JurnalUmum()
    {
        $data=JurnalUmum::get();
        return view('admin.JurnalUmum', compact('data'));
    }
    public function ValidasiJurnalUmum()
    {
        return view('admin.ValidasiJurnalUmum');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'akun_id' => 'required|exists:akunTransaksi,id',
            'tanggal' => 'required|date',
            'keterangan' => 'required|string',
            'bukti' => 'nullable|string|max:128',
            'debit_atau_kredit' => 'required|numeric',
            'nilai' => 'required|numeric',
        ]);
        // if ($validator->fails()) {
        //     // Log kesalahan untuk debugging
        //     Log::error('Validation failed', ['errors' => $validator->errors()]);

        //     // Kembali dengan respons JSON jika validasi gagal
        //     return response()->json([
        //         'status' => 'error',
        //         'errors' => $validator->errors()
        //     ], 422);
        // }
        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);
        $data = $request->only([
            'akun_id',
            'tanggal',
            'keterangan',
            'bukti',
            'debit_atau_kredit',
            'nilai',
        ]);
        JurnalUmum::create($data);
        return redirect()->route('admin.JurnalUmum');
    }
}
