<?php

namespace App\Http\Controllers;

use App\Models\AkunTransaksi;
use App\Models\JurnalPenyesuaian;
use App\Models\JurnalUmum;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NeracaLajurController extends Controller
{
    public function NeracaLajur(Request $request)
    {
        $akunTransaksi = AkunTransaksi::orderBy('kode', 'asc')->get();
        $kriteria = $request->input('kriteria');
        $kategori = $request->input('kategori');
        $periode = $request->input('periode');
        $dateThreshold = null;

        // Tentukan tanggal threshold berdasarkan periode jika diperlukan
        if ($kriteria === 'periode') {
            if ($periode == 1) {
                $dateThreshold = Carbon::now()->subYear();
            } elseif ($periode == 2) {
                $dateThreshold = Carbon::now()->subMonth();
            } elseif ($periode == 3) {
                $dateThreshold = Carbon::now()->subWeek();
            }
        }

        // Query dan filter untuk Jurnal Umum
        $jurnalUmumResults = collect();
        foreach ($akunTransaksi as $akun) {
            $jurnalUmumQuery = JurnalUmum::where('akun_id', $akun->id);

            if ($dateThreshold) {
                $jurnalUmumQuery->where('created_at', '>=', $dateThreshold);
            } elseif ($kriteria === 'tanggal') {
                $tanggalAwal = $request->input('tanggal_awal');
                $tanggalAkhir = $request->input('tanggal_akhir');

                if ($tanggalAwal && $tanggalAkhir) {
                    $jurnalUmumQuery->whereBetween('created_at', [$tanggalAwal, $tanggalAkhir]);
                }
            }

            $jurnalUmumResults = $jurnalUmumResults->merge($jurnalUmumQuery->get());
        }

        // Query dan filter untuk Jurnal Penyesuaian
        $jurnalPenyesuaianResults = collect();
        foreach ($akunTransaksi as $akun) {
            $jurnalPenyesuaianQuery = JurnalPenyesuaian::where('akun_id', $akun->id);

            if ($dateThreshold) {
                $jurnalPenyesuaianQuery->where('created_at', '>=', $dateThreshold);
            } elseif ($kriteria === 'tanggal') {
                $tanggalAwal = $request->input('tanggal_awal');
                $tanggalAkhir = $request->input('tanggal_akhir');

                if ($tanggalAwal && $tanggalAkhir) {
                    $jurnalPenyesuaianQuery->whereBetween('created_at', [$tanggalAwal, $tanggalAkhir]);
                }
            }

            $jurnalPenyesuaianResults = $jurnalPenyesuaianResults->merge($jurnalPenyesuaianQuery->get());
        }

        // Lakukan agregasi berdasarkan kategori
        $aggregatedUmumResults = $jurnalUmumResults->groupBy('akun_id')->map(function ($group) {
            return $this->aggregateValues($group);
        });

        $aggregatedPenyesuaianResults = $jurnalPenyesuaianResults->groupBy('akun_id')->map(function ($group) {
            return $this->aggregateValues($group);
        });

        $combinedResults = $jurnalUmumResults->merge($jurnalPenyesuaianResults);
        $aggregatedResults = $combinedResults->groupBy('akun_id')->map(function ($group) {
            return $this->aggregateValues($group);
        });

        // Pilih hasil berdasarkan kategori
        switch ($kategori) {
            case 1: // Neraca Lajur
                $results = $aggregatedUmumResults;
                break;
            case 2: // Penyesuaian
                $results = $aggregatedPenyesuaianResults;
                break;
            case 3: // Neraca Lajur yang Disesuaikan
                $results = $aggregatedResults;
                break;
            default:
                $results = collect();
                break;
        }

        return view('admin.NeracaLajur', compact('akunTransaksi', 'results'));
    }

    // Fungsi untuk mengagregasi nilai berdasarkan debit/kredit
    private function aggregateValues($group)
    {
        return $group->reduce(function ($carry, $item) {
            if (!isset($carry->nilai)) {
                $carry->nilai = 0;
            }
            if (!isset($carry->debit_atau_kredit)) {
                $carry->debit_atau_kredit = $item->debit_atau_kredit;
            }

            if ($item->debit_atau_kredit !== $carry->debit_atau_kredit && $carry->debit_atau_kredit !== null) {
                $carry->nilai -= $item->nilai;
            } else {
                $carry->nilai += $item->nilai;
            }

            $carry->debit_atau_kredit = $item->debit_atau_kredit;

            return $carry;
        }, (object) ['akun_id' => $group->first()->akun_id, 'nilai' => 0]);
    }

}
