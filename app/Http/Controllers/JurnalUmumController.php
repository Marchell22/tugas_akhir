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
    public function JurnalUmumFilter(Request $request)
    {
        // Ambil parameter tanggal dari request
        $awal = $request->input('awal');
        $akhir = $request->input('akhir');

        // Query untuk mengambil data
        $query = JurnalUmum::query();

        // Tambahkan filter berdasarkan tanggal jika parameter ada
        if ($awal && $akhir) {
            $query->whereBetween('tanggal', [$awal, $akhir]);
        }

        // Ambil data
        $data = $query->get();

        // Kembalikan view dengan data
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
            'bukti' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg',
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
            'debit_atau_kredit',
            'nilai',
        ]);

        if ($request->bukti) {
            $data['bukti']  = $request->bukti->store('public/bukti');
        }
        JurnalUmum::create($data);
        return redirect()->route('admin.JurnalUmum');
    }
}
