<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Models\RencanaAnggaranBiaya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RencanaAnggaranBiayaController extends Controller
{
    public function RencanaAnggaranBiaya()
    {
        $data = RencanaAnggaranBiaya::all();
        return view('admin.RencanaAnggaranBiaya', compact('data'));
    }
    public function TambahRAB()
    {
        return view('admin.TambahRAB');
    }
    public function store(Request $request)
    {
        // Validate the incoming request data
        $uraianPekerjaan = json_decode($request->input('uraian_pekerjaan'), true);

        $rab = RencanaAnggaranBiaya::create([
            'bidang' => $request->input('bidang'),
            'kegiatan' => $request->input('kegiatan'),
            'waktu_pelaksanaan' => $request->input('waktu_pelaksanaan'),
            'output' => $request->input('output'),
            'uraian_pekerjaan' => $uraianPekerjaan,
        ]);

        return response()->json(['redirect' => route('admin.RencanaAnggaranBiaya')]);

    }

    public function edit($id)
    {
        $rencanaAnggaranBiaya = RencanaAnggaranBiaya::findOrFail($id);
        // Pastikan data diambil dalam format yang benar
        $uraianPekerjaan = $rencanaAnggaranBiaya->uraian_pekerjaan ?? []; // Ambil data lama, jika ada

        return view('admin.EditRAB', compact('rencanaAnggaranBiaya', 'uraianPekerjaan'));
    }
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'bidang' => 'required|string|max:255',
            'kegiatan' => 'required|string|max:255',
            'waktu_pelaksanaan' => 'required|string|max:255',
            'output' => 'required|string|max:255',
            'uraian_pekerjaan' => 'required|array',
            'uraian_pekerjaan.*.id' => 'nullable|integer',
            'uraian_pekerjaan.*.uraian_pekerjaan' => 'required|string',
            'uraian_pekerjaan.*.satuan' => 'required|string',
            'uraian_pekerjaan.*.volume' => 'required|numeric',
            'uraian_pekerjaan.*.harga_satuan' => 'required|numeric',
            'uraian_pekerjaan.*.akun_id' => 'required|numeric',
            'uraian_pekerjaan.*.total_harga' => 'required|numeric',
        ]);

        $rencanaAnggaranBiaya = RencanaAnggaranBiaya::findOrFail($id);
        $existingData = $rencanaAnggaranBiaya->uraian_pekerjaan;

        // Create a map of existing data keyed by ID
        $existingDataMap = [];
        foreach ($existingData as $entry) {
            $existingDataMap[$entry['id']] = $entry;
        }

        $newData = $validatedData['uraian_pekerjaan'];
        $finalData = [];

        foreach ($newData as $newEntry) {
            $entryId = $newEntry['id'] ?? null;

            if ($entryId && isset($existingDataMap[$entryId])) {
                // Jika data ada dalam entri yang ada, periksa perubahan
                $existingEntry = $existingDataMap[$entryId];

                if (
                    $existingEntry['uraian_pekerjaan'] !== $newEntry['uraian_pekerjaan'] ||
                    $existingEntry['satuan'] !== $newEntry['satuan'] ||
                    $existingEntry['volume'] !== $newEntry['volume'] ||
                    $existingEntry['harga_satuan'] !== $newEntry['harga_satuan'] ||
                    $existingEntry['total_harga'] !== $newEntry['total_harga']||
                    $existingEntry['akun_id'] !== $newEntry['akun_id']
                ) {
                    // Update hanya jika ada perubahan
                    $finalData[] = $newEntry;
                } else {
                    // Jika tidak ada perubahan, simpan entri asli
                    $finalData[] = $existingEntry;
                }
                // Hapus dari peta karena sudah diproses
                unset($existingDataMap[$entryId]);
            } else {
                // Tambah entri baru (tanpa ID atau ID tidak ditemukan dalam existing data)
                $finalData[] = $newEntry;
            }
        }

        // Tambahkan data lama yang tidak terhapus atau diubah
        foreach ($existingDataMap as $remainingEntry) {
            $finalData[] = $remainingEntry;
        }

        // Update the model
        $rencanaAnggaranBiaya->update([
            'bidang' => $validatedData['bidang'],
            'kegiatan' => $validatedData['kegiatan'],
            'waktu_pelaksanaan' => $validatedData['waktu_pelaksanaan'],
            'output' => $validatedData['output'],
            'uraian_pekerjaan' => $finalData,
        ]);

        return response()->json([
            'message' => 'Data successfully updated.',
            'redirect_url' => route('admin.RencanaAnggaranBiaya')
        ]);
    }
    public function delete(Request $request)
{
    // Menangkap nilai ID dan Row ID dari permintaan
    $id = $request->input('id');
    $rowId = $request->input('rowId');

    Log::info('Delete function called with ID:', ['id' => $id]);
    Log::info('Row ID to delete:', ['rowId' => $rowId]);

    // Menemukan Rencana Anggaran Biaya berdasarkan ID
    $rencanaAnggaranBiaya = RencanaAnggaranBiaya::find($id);

    if ($rencanaAnggaranBiaya) {
        // Ambil data uraian_pekerjaan yang berupa JSON
        $uraianPekerjaan = $rencanaAnggaranBiaya->uraian_pekerjaan;

        // Cari index dari rowId yang ingin dihapus
        $indexToDelete = null;
        foreach ($uraianPekerjaan as $index => $item) {
            if ($item['id'] == $rowId) {
                $indexToDelete = $index;
                break;
            }
        }

        if ($indexToDelete !== null) {
            // Hapus item dari array jika ditemukan
            unset($uraianPekerjaan[$indexToDelete]);

            // Reindex array jika perlu
            $rencanaAnggaranBiaya->uraian_pekerjaan = array_values($uraianPekerjaan);

            // Simpan kembali model
            $rencanaAnggaranBiaya->save();

            Log::info('Row deleted successfully with ID:', ['id' => $rowId]);

            return response()->json(['message' => 'Row deleted successfully']);
        } else {
            Log::warning('Row with given ID not found in JSON data.', ['rowId' => $rowId]);
            return response()->json(['message' => 'Row not found in data'], 404);
        }
    } else {
        Log::warning('Rencana Anggaran Biaya not found.', ['id' => $id]);
        return response()->json(['message' => 'Rencana Anggaran Biaya not found'], 404);
    }
}

    public function LaporanRAB($id)
    {
        $rencanaAnggaranBiaya = RencanaAnggaranBiaya::findOrFail($id);
        $uraianPekerjaan = $rencanaAnggaranBiaya->uraian_pekerjaan ?? [];
        return view('admin.LaporanRAB', compact('rencanaAnggaranBiaya', 'uraianPekerjaan'));
    }

}