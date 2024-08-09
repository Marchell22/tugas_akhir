<?php

namespace App\Http\Controllers;

use App\Models\AkunTransaksi;
use App\Models\JurnalPenyesuaian;
use App\Models\JurnalUmum;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BukuBesarController extends Controller
{
    public function BukuBesar(Request $request)
    {
        $akunTransaksiList = AkunTransaksi::orderBy('kode')->get(); // Get the list of AkunTransaksi
        $results = collect(); // This will hold the search results

        // Check if the search form is submitted
        if ($request->has('akun') && $request->has('kriteria')) {
            $akunId = $request->input('akun');
            $kriteria = $request->input('kriteria');

            // Query for Jurnal Umum
            $jurnalUmumQuery = JurnalUmum::where('akun_id', $akunId);

            // Query for Jurnal Penyesuaian
            $jurnalPenyesuaianQuery = JurnalPenyesuaian::where('akun_id', $akunId);

            if ($kriteria === 'periode') {
                // Filter by period (1 Year, 1 Month, 1 Week)
                $period = $request->input('periode');
                $dateThreshold = null;

                if ($period == 1) {
                    $dateThreshold = Carbon::now()->subYear();
                } elseif ($period == 2) {
                    $dateThreshold = Carbon::now()->subMonth();
                } elseif ($period == 3) {
                    $dateThreshold = Carbon::now()->subWeek();
                }

                if ($dateThreshold) {
                    $jurnalUmumQuery->where('created_at', '>=', $dateThreshold);
                    $jurnalPenyesuaianQuery->where('created_at', '>=', $dateThreshold);
                }
            } elseif ($kriteria === 'tanggal') {
                // Filter by specific date range
                $tanggalAwal = $request->input('tanggal_awal');
                $tanggalAkhir = $request->input('tanggal_akhir');

                if ($tanggalAwal && $tanggalAkhir) {
                    $jurnalUmumQuery->whereBetween('created_at', [$tanggalAwal, $tanggalAkhir]);
                    $jurnalPenyesuaianQuery->whereBetween('created_at', [$tanggalAwal, $tanggalAkhir]);
                }
            }

            // Get the results from both queries
            $jurnalUmumResults = $jurnalUmumQuery->get();
            $jurnalPenyesuaianResults = $jurnalPenyesuaianQuery->get();

            // Combine the results
            $results = $results->merge($jurnalUmumResults);
            $results = $results->merge($jurnalPenyesuaianResults);

            // Optionally sort the results by created_at
            $results = $results->sortBy('created_at');
        }

        // Return the view with both the list and the search results
        return view('admin.BukuBesar', compact('akunTransaksiList', 'results'));
    }
}
