<?php

namespace App\Http\Controllers;

use App\Models\AkunTransaksi;
use App\Models\JurnalUmum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class JurnalUmumController extends Controller
{
    public function JurnalUmum(Request $request)
    {
       
        $data = JurnalUmum::where('status', 'approved')->get();
        return view('admin.JurnalUmum', compact('data'));
    }
    public function userJurnalUmum(Request $request)
    {
        $data = JurnalUmum::all();
        return view('user.JurnalUmum', compact('data'));
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
        // if ($request->hasFile('bukti')) {
        //     // Simpan file dan ambil nama file
        //     $path = $request->file('bukti')->store('public/bukti');
        //     $data['bukti'] = basename($path); // Simpan hanya nama file di database
        // }

        // Ambil data
        $query->where('status', 'approved'); 
        $data = $query->get();

        // Kembalikan view dengan data
        return view('admin.JurnalUmum', compact('data'));
    }
    public function ValidasiJurnalUmumFilter(Request $request)
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
        // if ($request->hasFile('bukti')) {
        //     // Simpan file dan ambil nama file
        //     $path = $request->file('bukti')->store('public/bukti');
        //     $data['bukti'] = basename($path); // Simpan hanya nama file di database
        // }

        // Ambil data
        $query->whereIn('status', ['pending', 'rejected']);
        $data = $query->get();

        // Kembalikan view dengan data
        return view('admin.ValidasiJurnalumum', compact('data'));
    }
    public function userJurnalUmumFilter(Request $request)
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
        // if ($request->hasFile('bukti')) {
        //     // Simpan file dan ambil nama file
        //     $path = $request->file('bukti')->store('public/bukti');
        //     $data['bukti'] = basename($path); // Simpan hanya nama file di database
        // }

        // Ambil data
        
        $data = $query->get();

        // Kembalikan view dengan data
        return view('user.JurnalUmum', compact('data'));
    }
    public function ValidasiJurnalUmum()
    {
        $data = JurnalUmum::whereIn('status', ['pending', 'rejected'])->get();
        return view('admin.ValidasiJurnalUmum', compact('data'));
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
            'status' => 'required|string|in:pending,approved,rejected',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $akun = AkunTransaksi::findOrFail($request->akun_id);
        $nilai = $request->nilai;

        // Jika post_saldo tidak sama dengan debit_atau_kredit, berikan nilai negatif
        if ($akun->post_saldo != $request->debit_atau_kredit) {
            $nilai = -abs($nilai); // Ubah nilai menjadi negatif
        }

        $data = $request->only([
            'akun_id',
            'tanggal',
            'keterangan',
            'debit_atau_kredit',
        ]);
        $data['nilai'] = $nilai;
        $data['status'] = $request->input('status', 'approved');

        if ($request->hasFile('bukti')) {
            $path = $request->file('bukti')->store('public/bukti');
            $data['bukti'] = basename($path); // Simpan hanya nama file di database
        }

        JurnalUmum::create($data);
        return redirect()->route('admin.JurnalUmum');
    }
    public function userStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'akun_id' => 'required|exists:akunTransaksi,id',
            'tanggal' => 'required|date',
            'keterangan' => 'required|string',
            'bukti' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg',
            'debit_atau_kredit' => 'required|numeric',
            'nilai' => 'required|numeric',
            'status' => 'required|string|in:pending,approved,rejected',
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
        $akun = AkunTransaksi::findOrFail($request->akun_id);
        $nilai = $request->nilai;

        // Jika post_saldo tidak sama dengan debit_atau_kredit, berikan nilai negatif
        if ($akun->post_saldo != $request->debit_atau_kredit) {
            $nilai = -abs($nilai); // Ubah nilai menjadi negatif
        }
        $data = $request->only([
            'akun_id',
            'tanggal',
            'keterangan',
            'debit_atau_kredit',
            'nilai',
        ]);
        $data['nilai'] = $nilai;
        $data['status'] = $request->input('status', 'pending');

        if ($request->hasFile('bukti')) {
            // Simpan file dan ambil nama file
            $path = $request->file('bukti')->store('public/bukti');
            $data['bukti'] = basename($path); // Simpan hanya nama file di database
        }
        JurnalUmum::create($data);
        return redirect()->route('user.JurnalUmum');
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'akun_id' => 'required|exists:akunTransaksi,id',
            'tanggal' => 'required|date',
            'keterangan' => 'required|string',
            'bukti' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg',
            'debit_atau_kredit' => 'required|numeric',
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
        $akun = AkunTransaksi::findOrFail($request->akun_id);
        $nilai = $request->nilai;
        $jurnal = JurnalUmum::find($id);
        // Jika post_saldo tidak sama dengan debit_atau_kredit, berikan nilai negatif
        if ($akun->post_saldo != $request->debit_atau_kredit) {
            $nilai = -abs($nilai); // Ubah nilai menjadi negatif
        }else{
            $nilai = abs($nilai);
        }
        if (!$jurnal) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        $jurnal->akun_id = $request->input('akun_id');
        $jurnal->tanggal = $request->input('tanggal');
        $jurnal->keterangan = $request->input('keterangan');
        $jurnal->debit_atau_kredit = $request->input('debit_atau_kredit');
        $jurnal->nilai = $nilai;

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

        return redirect()->route('admin.JurnalUmum')->with('success', 'Data berhasil diperbarui.');
    }
    public function updateStatus(Request $request, $id)
    {
        Log::info('Update Status Request:', ['id' => $id, 'request_data' => $request->all()]);

        $validated = $request->validate([
            'status' => 'required|in:approved,rejected,pending',
        ]);

        $akun = JurnalUmum::find($id);

        if (!$akun) {
            Log::info('Data not found');
            return redirect()->route('admin.ValidasiJurnalUmum')->with('error', 'Data not found.');
        }

        $akun->status = $validated['status'];
        $updated = $akun->save();

        Log::info('Akun before save:', ['akun' => $akun]);
        Log::info('Status update result:', ['updated' => $updated]);

        return redirect()->route('admin.JurnalUmum')->with('success', 'Status updated successfully.');
    }
}
