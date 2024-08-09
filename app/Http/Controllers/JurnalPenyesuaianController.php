<?php

namespace App\Http\Controllers;

use App\Models\JurnalPenyesuaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class JurnalPenyesuaianController extends Controller
{
    public function JurnalPenyesuaian()
    {
        $data = JurnalPenyesuaian::get();
        return view('admin.JurnalPenyesuaian', compact('data'));
    }
    public function JurnalPenyesuaianFilter(Request $request)
    {
        // Ambil parameter tanggal dari request
        $awal = $request->input('awal');
        $akhir = $request->input('akhir');

        // Query untuk mengambil data
        $query = JurnalPenyesuaian::query();

        // Tambahkan filter berdasarkan tanggal jika parameter ada
        if ($awal && $akhir) {
            $query->whereBetween('tanggal', [$awal, $akhir]);
        }
        // if ($request->hasFile('bukti')) {
        //     // Simpan file dan ambil nama file
        //     $path = $request->file('bukti')->store('public/bukti');
        //     $data['bukti'] = basename($path); // Simpan hanya nama file di database
        // }

        // Ambil data
        $data = $query->get();

        // Kembalikan view dengan data
        return view('admin.JurnalPenyesuaian', compact('data'));
    }
    public function ValidasiJurnalPenyesuaian()
    {
        return view('admin.ValidasiJurnalPenyesuaian');
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

        if ($request->hasFile('bukti')) {
            // Simpan file dan ambil nama file
            $path = $request->file('bukti')->store('public/bukti');
            $data['bukti'] = basename($path); // Simpan hanya nama file di database
        }
        JurnalPenyesuaian::create($data);
        return redirect()->route('admin.JurnalPenyesuaian');
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'akun_id' => 'required',
            'tanggal' => 'required|date',
            'keterangan' => 'required|string',
            'bukti' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:2048',
            'debit_atau_kredit' => 'required|in:1,2',
            'nilai' => 'required|numeric',
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

        $jurnal = JurnalPenyesuaian::find($id);

        if (!$jurnal) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        $jurnal->akun_id = $request->input('akun_id');
        $jurnal->tanggal = $request->input('tanggal');
        $jurnal->keterangan = $request->input('keterangan');
        $jurnal->debit_atau_kredit = $request->input('debit_atau_kredit');
        $jurnal->nilai = $request->input('nilai');

        if ($request->hasFile('bukti')) {
            // Hapus gambar lama jika ada
            if ($jurnal->bukti && Storage::exists('public/bukti/' . $jurnal->bukti)) {
                Storage::delete('public/bukti/' . $jurnal->bukti);
            }

            // Simpan gambar baru
            $path = $request->file('bukti')->store('public/bukti');
            $jurnal->bukti = basename($path);
        }

        $jurnal->save();

        return redirect()->route('admin.JurnalPenyesuaian')->with('success', 'Data berhasil diperbarui.');
    }
}
