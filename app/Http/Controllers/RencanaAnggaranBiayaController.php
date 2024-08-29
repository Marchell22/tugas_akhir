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
                    $existingEntry['total_harga'] !== $newEntry['total_harga']
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
    public function delete($id)
    {
        // Retrieve the record that contains the JSON data
        $rencanaAnggaranBiaya = RencanaAnggaranBiaya::first(); // Adjust this to match your query logic

        if ($rencanaAnggaranBiaya) {
            // Check if the column is already an array or still a JSON string
            $data = $rencanaAnggaranBiaya->uraian_pekerjaan;

            // Decode the JSON data only if it's a valid JSON string
            if (is_string($data)) {
                $data = json_decode($data, true);
            }

            if (!is_array($data)) {
                return response()->json(['message' => 'Invalid JSON format'], 500);
            }

            // Find the index of the item with the given ID
            $index = array_search($id, array_column($data, 'id'));

            if ($index !== false) {
                // Remove the item from the array
                array_splice($data, $index, 1);

                // Encode the updated array back to JSON
                $rencanaAnggaranBiaya->uraian_pekerjaan = $data;

                // Save the updated record
                $rencanaAnggaranBiaya->save();

                return response()->json(['message' => 'Row deleted successfully']);
            } else {
                return response()->json(['message' => 'Row not found'], 404);
            }
        } else {
            return response()->json(['message' => 'Record not found'], 404);
        }
    }

}
