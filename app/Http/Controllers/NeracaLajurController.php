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
        $jurnalUmumResults = collect();
        $jurnalPenyesuaianResults = collect();

        $kriteria = $request->input('kriteria');
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
        foreach ($akunTransaksi as $akun) {
            $akunId = $akun->id;

            // Query Jurnal Umum berdasarkan akun_id
            $jurnalUmumQuery = JurnalUmum::where('akun_id', $akunId);

            // Filter berdasarkan kriteria dan periode
            if ($dateThreshold) {
                $jurnalUmumQuery->where('created_at', '>=', $dateThreshold);
            } elseif ($kriteria === 'tanggal') {
                $tanggalAwal = $request->input('tanggal_awal');
                $tanggalAkhir = $request->input('tanggal_akhir');

                if ($tanggalAwal && $tanggalAkhir) {
                    $jurnalUmumQuery->whereBetween('created_at', [$tanggalAwal, $tanggalAkhir]);
                }
            }

            // Gabungkan hasil query ke koleksi utama
            $jurnalUmumResults = $jurnalUmumResults->merge($jurnalUmumQuery->get());

            // Query Jurnal Penyesuaian berdasarkan akun_id untuk kelompok_akun_id 4
            $jurnalPenyesuaianQuery = JurnalPenyesuaian::where('akun_id', $akunId);

            // Filter berdasarkan kriteria dan periode
            if ($dateThreshold) {
                $jurnalPenyesuaianQuery->where('created_at', '>=', $dateThreshold);
            } elseif ($kriteria === 'tanggal') {
                $tanggalAwal = $request->input('tanggal_awal');
                $tanggalAkhir = $request->input('tanggal_akhir');

                if ($tanggalAwal && $tanggalAkhir) {
                    $jurnalPenyesuaianQuery->whereBetween('created_at', [$tanggalAwal, $tanggalAkhir]);
                }
            }

            // Gabungkan hasil query ke koleksi utama
            $jurnalPenyesuaianResults = $jurnalPenyesuaianResults->merge($jurnalPenyesuaianQuery->get());
        }
        $aggregatedUmumResults = $jurnalUmumResults->groupBy('akun_id')->map(function ($group) {
            return $group->reduce(function ($carry, $item) {
                if (!isset($carry->nilai)) {
                    $carry->nilai = 0;
                }
                if (!isset($carry->debit_atau_kredit)) {
                    $carry->debit_atau_kredit = $item->debit_atau_kredit; // Atur sesuai item pertama
                }

                // Cek jika debit_atau_kredit berbeda, maka lakukan pengurangan
                if ($item->debit_atau_kredit !== $carry->debit_atau_kredit && $carry->debit_atau_kredit !== null) {
                    $carry->nilai -= $item->nilai;
                } else {
                    $carry->nilai += $item->nilai;
                }

                // Set debit_atau_kredit di awal agar nilai berikutnya dapat diperiksa
                $carry->debit_atau_kredit = $item->debit_atau_kredit;

                return $carry;
            }, (object) ['akun_id' => $group->first()->akun_id, 'nilai' => 0]);
        });
        $aggregatedPenyesuaianResults = $jurnalPenyesuaianResults->groupBy('akun_id')->map(function ($group) {
            return $group->reduce(function ($carry, $item) {
                if (!isset($carry->nilai)) {
                    $carry->nilai = 0;
                }
                if (!isset($carry->debit_atau_kredit)) {
                    $carry->debit_atau_kredit = $item->debit_atau_kredit; // Atur sesuai item pertama
                }

                // Cek jika debit_atau_kredit berbeda, maka lakukan pengurangan
                if ($item->debit_atau_kredit !== $carry->debit_atau_kredit && $carry->debit_atau_kredit !== null) {
                    $carry->nilai -= $item->nilai;
                } else {
                    $carry->nilai += $item->nilai;
                }

                // Set debit_atau_kredit di awal agar nilai berikutnya dapat diperiksa
                $carry->debit_atau_kredit = $item->debit_atau_kredit;

                return $carry;
            }, (object) ['akun_id' => $group->first()->akun_id, 'nilai' => 0]);
        });
        return view('admin.NeracaLajur', compact('akunTransaksi', 'aggregatedUmumResults'));
    }
}
