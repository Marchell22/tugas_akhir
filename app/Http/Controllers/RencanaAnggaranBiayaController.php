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
            'uraian_pekerjaan.*.uraian_pekerjaan' => 'required|string',
            'uraian_pekerjaan.*.satuan' => 'required|string',
            'uraian_pekerjaan.*.volume' => 'required|numeric',
            'uraian_pekerjaan.*.harga_satuan' => 'required|numeric',
            'uraian_pekerjaan.*.total_harga' => 'required|numeric',
        ]);

        $rencanaAnggaranBiaya = RencanaAnggaranBiaya::findOrFail($id);

        // Existing uraian_pekerjaan data
        $existingData = $rencanaAnggaranBiaya->uraian_pekerjaan;

        // Map existing data to easily find matching entries
        $existingDataMap = [];
        foreach ($existingData as $entry) {
            $key = implode('-', [
                $entry['uraian_pekerjaan'],
                $entry['satuan'],
                $entry['volume'],
                $entry['harga_satuan'],
                $entry['total_harga']
            ]);
            $existingDataMap[$key] = $entry;
        }

        $newData = $validatedData['uraian_pekerjaan'];
        $updatedData = [];
        $newEntries = [];

        foreach ($newData as $newEntry) {
            $key = implode('-', [
                $newEntry['uraian_pekerjaan'],
                $newEntry['satuan'],
                $newEntry['volume'],
                $newEntry['harga_satuan'],
                $newEntry['total_harga']
            ]);

            if (isset($existingDataMap[$key])) {
                // Compare existing and new data
                if ($existingDataMap[$key] !== $newEntry) {
                    $updatedData[] = $newEntry; // Collect updated entries
                }
                // Remove this key from existing map to keep track of which ones were updated
                unset($existingDataMap[$key]);
            } else {
                // New entry
                $newEntries[] = $newEntry;
            }
        }

        // Add remaining old data that was not updated
        $finalData = array_merge(array_values($existingDataMap), $updatedData, $newEntries);

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

}
