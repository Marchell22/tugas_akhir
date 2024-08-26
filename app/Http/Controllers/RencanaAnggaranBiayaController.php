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

        return response()->json(['message' => 'Data successfully stored.']);
    }

    public function edit($id)
    {
        $rencanaAnggaranBiaya = RencanaAnggaranBiaya::findOrFail($id);

        return view('admin.EditRAB', compact('rencanaAnggaranBiaya'));
    }
    public function update(Request $request, $id)
    {
        Log::info('Received update request: ', $request->all()); // Log the request data

        $validatedData = $request->validate([
            'bidang' => 'required|string|max:255',
            'kegiatan' => 'required|string|max:255',
            'waktu_pelaksanaan' => 'required|string|max:255',
            'output' => 'required|string|max:255',
            'uraian_pekerjaan' => 'required|array',
            'satuan' => 'required|array',
            'volume' => 'required|array',
            'harga_satuan' => 'required|array',
            'total_harga' => 'required|array',
        ]);

        $uraianPekerjaan = [];

        foreach ($validatedData['uraian_pekerjaan'] as $index => $uraian) {
            $uraianPekerjaan[] = [
                'uraian_pekerjaan' => $uraian,
                'satuan' => $validatedData['satuan'][$index],
                'volume' => $validatedData['volume'][$index],
                'harga_satuan' => $validatedData['harga_satuan'][$index],
                'total_harga' => $validatedData['total_harga'][$index],
            ];
        }

        $rencanaAnggaranBiaya = RencanaAnggaranBiaya::findOrFail($id);
        $rencanaAnggaranBiaya->update([
            'bidang' => $validatedData['bidang'],
            'kegiatan' => $validatedData['kegiatan'],
            'waktu_pelaksanaan' => $validatedData['waktu_pelaksanaan'],
            'output' => $validatedData['output'],
            'uraian_pekerjaan' => $uraianPekerjaan, // JSON array stored directly
        ]);

        return redirect()->route('admin.RencanaAnggaranBiaya', $id)->with('success', 'Rencana Anggaran Biaya berhasil diperbarui.');
    }
}
