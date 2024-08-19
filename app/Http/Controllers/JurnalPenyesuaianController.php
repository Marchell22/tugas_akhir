<?php

namespace App\Http\Controllers;

use App\Models\AkunTransaksi;
use App\Models\JurnalPenyesuaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class JurnalPenyesuaianController extends Controller
{
    public function JurnalPenyesuaian()
    {
        $data = JurnalPenyesuaian::where('status', 'approved')->get();
        return view('admin.JurnalPenyesuaian', compact('data'));
    }

    public function userJurnalPenyesuaian()
    {
        $data = JurnalPenyesuaian::all();
        return view('user.JurnalPenyesuaian', compact('data'));
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
        $query->where('status', 'approved');
        $data = $query->get();

        // Kembalikan view dengan data
        return view('user.JurnalPenyesuaian', compact('data'));
    }
    public function ValidasiJurnalPenyesuaianFilter(Request $request)
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
        $query->whereIn('status', ['rejected','pending']);
        $data = $query->get();

        // Kembalikan view dengan data
        return view('admin.ValidasiJurnalPenyesuaian', compact('data'));
    }
    public function userJurnalPenyesuaianFilter(Request $request)
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
        $data = JurnalPenyesuaian::whereIn('status', ['pending', 'rejected'])->get();
        return view('admin.ValidasiJurnalPenyesuaian', compact('data'));
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
        ]);
        $data['nilai'] = $nilai;
        $data['status'] = $request->input('status', 'approved');

        if ($request->hasFile('bukti')) {
            // Simpan file dan ambil nama file
            $path = $request->file('bukti')->store('public/bukti');
            $data['bukti'] = basename($path); // Simpan hanya nama file di database
        }
        JurnalPenyesuaian::create($data);
        return redirect()->route('admin.JurnalPenyesuaian');
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
        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);
        // if ($validator->fails()) {
        //     // Log kesalahan untuk debugging
        //     Log::error('Validation failed', ['errors' => $validator->errors()]);

        //     // Kembali dengan respons JSON jika validasi gagal
        //     return response()->json([
        //         'status' => 'error',
        //         'errors' => $validator->errors()
        //     ], 422);
        // }
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
        $data['status'] = $request->input('status', 'pending');

        if ($request->hasFile('bukti')) {
            // Simpan file dan ambil nama file
            $path = $request->file('bukti')->store('public/bukti');
            $data['bukti'] = basename($path); // Simpan hanya nama file di database
        }
        JurnalPenyesuaian::create($data);
        return redirect()->route('user.JurnalPenyesuaian');
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
        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);
        // if ($validator->fails()) {
        //     // Log kesalahan untuk debugging
        //     Log::error('Validation failed', ['errors' => $validator->errors()]);

        //     // Kembali dengan respons JSON jika validasi gagal
        //     return response()->json([
        //         'status' => 'error',
        //         'errors' => $validator->errors()
        //     ], 422);
        // }
        $akun = AkunTransaksi::findOrFail($request->akun_id);
        $nilai = $request->nilai;
        $jurnal = JurnalPenyesuaian::find($id);
        if ($akun->post_saldo != $request->debit_atau_kredit) {
            $nilai = -abs($nilai); // Ubah nilai menjadi negatif
        } else {
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

        return redirect()->route('admin.JurnalPenyesuaian')->with('success', 'Data berhasil diperbarui.');
    }
    public function updateStatus(Request $request, $id)
    {
        Log::info('Update Status Request:', ['id' => $id, 'request_data' => $request->all()]);

        $validated = $request->validate([
            'status' => 'required|in:approved,rejected,pending',
        ]);

        $akun = JurnalPenyesuaian::find($id);

        if (!$akun) {
            Log::info('Data not found');
            return redirect()->route('admin.ValidasiJurnalUmum')->with('error', 'Data not found.');
        }

        $akun->status = $validated['status'];
        $updated = $akun->save();

        Log::info('Akun before save:', ['akun' => $akun]);
        Log::info('Status update result:', ['updated' => $updated]);

        return redirect()->route('admin.JurnalPenyesuaian')->with('success', 'Status updated successfully.');
    }
}
