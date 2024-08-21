<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Models\RencanaAnggaranBiaya;
use Illuminate\Http\Request;

class RencanaAnggaranBiayaController extends Controller
{
    public function RencanaAnggaranBiaya(){
       return view('admin.RencanaAnggaranBiaya');
    }
    public function TambahRAB()
    {
        return view('admin.TambahRAB');
    }
    public function store(Request $request)
    {
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

        RencanaAnggaranBiaya::create([
            'bidang' => $validatedData['bidang'],
            'kegiatan' => $validatedData['kegiatan'],
            'waktu_pelaksanaan' => $validatedData['waktu_pelaksanaan'],
            'output' => $validatedData['output'],
            'uraian_pekerjaan' => $uraianPekerjaan, // JSON array stored directly
        ]);

        return redirect()->back()->with('success', 'Rencana Anggaran Biaya berhasil ditambahkan.');
    }
}    
