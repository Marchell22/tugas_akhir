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
    $data = AkunTransaksi::where('status', 'approved')->get();
    return view('admin.AkunTransaksi', compact('data'));
  }
  public function ValidasiTransaksi()
  {
    $data = AkunTransaksi::whereIn('status', ['pending', 'rejected'])->get();
    return view('admin.ValidasiTransaksi', compact('data'));
  }
  public function updateStatus(Request $request, $id)
  {
    Log::info('Update Status Request:', ['id' => $id, 'request_data' => $request->all()]);

    $validated = $request->validate([
      'status' => 'required|in:approved,rejected,pending',
    ]);

    $akun = AkunTransaksi::find($id);

    if (!$akun) {
      Log::info('Data not found');
      return redirect()->route('admin.ValidasiTransaksi')->with('error', 'Data not found.');
    }

    $akun->status = $validated['status'];
    $updated = $akun->save();

    Log::info('Akun before save:', ['akun' => $akun]);
    Log::info('Status update result:', ['updated' => $updated]);

    return redirect()->route('admin.ValidasiTransaksi')->with('success', 'Status updated successfully.');
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
      'status' => 'required|string|in:pending,approved,rejected',
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
    $data['status'] = $request->input('status', 'approved');
    // Membuat data baru di model AkunTransaksi
    AkunTransaksi::create($data);
    return redirect()->route('admin.AkunTransaksi');
  }

  public function userStore(Request $request)
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
      'status' => 'required|string|in:pending,approved,rejected',
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
    $data['status'] = $request->input('status', 'pending');
    // Membuat data baru di model AkunTransaksi
    AkunTransaksi::create($data);
    return redirect()->route('user.AkunTransaksi');
  }

  public function update(Request $request, $id)
  {
    $validator = Validator::make($request->all(), [
      'kelompok_akun_id' => 'required|numeric',
      'kode' => 'required|numeric',
      'nama' => 'required|string|max:128',
      'post_saldo' => 'required|numeric',
      'post_penyesuaian' => 'required|numeric',
      'post_laporan' => 'required|numeric',
      'kelompok_laporan_posisi_keuangan' => 'nullable|numeric',
    ]);
    if ($validator->fails()) {
      // Log kesalahan untuk debugging
      Log::error('Validation failed', ['errors' => $validator->errors()]);

      // Kembali dengan respons JSON jika validasi gagal
      return response()->json([
        'status' => 'error',
        'errors' => $validator->errors()
      ], 422);
    }

    // if ($validator->fails()) {
    //   return redirect()->back()->withInput()->withErrors($validator);
    // }
    $user = AkunTransaksi::find($id);

    if (!$user) {
      return redirect()->route('admin.AkunPengguna')->with('error', 'User not found.');
    }
    // $user = $request->input([
    //   'kelompok_akun_id',
    //   'kode',
    //   'nama',
    //   'post_saldo',
    //   'post_penyesuaian',
    //   'post_laporan',
    //   'kelompok_laporan_posisi_keuangan'
    // ]);
    $user->kelompok_akun_id = $request->input('kelompok_akun_id');
    $user->kode = $request->input('kode');
    $user->nama = $request->input('nama');
    $user->post_penyesuaian = $request->input('post_penyesuaian');
    $user->post_laporan = $request->input('post_laporan');
    $user->kelompok_laporan_posisi_keuangan = $request->input('kelompok_laporan_posisi_keuangan');
    $user->save();
    return redirect()->route('admin.AkunTransaksi')->with('success', 'Data pengguna berhasil diperbarui.');
  }
  public function UserAkunTransaksi()
  {
    $data = AkunTransaksi::all();
    return view('user.AkunTransaksi', compact('data'));
  }
}
