<?php

namespace App\Http\Controllers;

use App\Models\AkunTransaksi;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AkunTransaksiController extends Controller
{
  public function AkunTransaksi()
  {
    $data = AkunTransaksi::get();
    return view('admin.AkunTransaksi', compact('data'));
  }
  public function ValidasiTransaksi()
  {
    return view('admin.ValidasiTransaksi');
  }
  public function store(Request $request)
  {
    
    // Validasi input
    $validator = Validator::make($request->all(), [
      'kelompok_akun_id' => 'required|numeric',
      'kode' => 'required|numeric',
      'nama' => 'required|string|max:128',
      'post_saldo' => 'required|numeric',
      'post_penyesuaian' => 'required|numeric',
      'post_laporan' => 'required|numeric',
      'kelompok_laporan_posisi_keuangan' => 'nullable|numeric',
    ]);

    // if ($validator->fails()) {
    //   // Log kesalahan untuk debugging
    //   Log::error('Validation failed', ['errors' => $validator->errors()]);

    //   // Kembali dengan respons JSON jika validasi gagal
    //   return response()->json([
    //     'status' => 'error',
    //     'errors' => $validator->errors()
    //   ], 422);
    // }
    if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);
    // Data input yang diterima

    $data = $request->only([
      'kelompok_akun_id',
      'kode',
      'nama',
      'post_saldo',
      'post_penyesuaian',
      'post_laporan',
      'kelompok_laporan_posisi_keuangan'
    ]);
    // Membuat data baru di model AkunTransaksi
    AkunTransaksi::create($data);
    return redirect()->route('admin.AkunTransaksi');
  }
}
