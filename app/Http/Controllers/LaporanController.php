<?php

namespace App\Http\Controllers;

use App\Models\AkunTransaksi;
use App\Models\JurnalPenyesuaian;
use App\Models\JurnalUmum;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LaporanController extends Controller
{
    public function Ekuitas(Request $request)
    {
        $akunTransaksi =  AkunTransaksi::where('status', 'approved')->get();
        $jurnalUmumResults = collect();
        $jurnalPenyesuaianResults = collect();

        $kriteria = $request->input('kriteria');
        $periode = $request->input('periode');
        $dateThreshold = null;

        // Tentukan tanggal threshold berdasarkan periode jika diperlukan
        if ($kriteria === 'periode') {
            $currentdate = Carbon::now()->toDateString();
            if ($periode == 1) {
                $dateThreshold = Carbon::now()->subYear()->toDateString();
            } elseif ($periode == 2) {
                $dateThreshold = Carbon::now()->subMonth()->toDateString();
            } elseif ($periode == 3) {
                $dateThreshold = Carbon::now()->subWeek()->toDateString();
            }
            session(['dataThreshold' => $dateThreshold, 'currentdate' => $currentdate]);
        } elseif ($kriteria === 'tanggal') {
            // Filter by specific date range
            $tanggalAwal = $request->input('tanggal_awal');
            $tanggalAkhir = $request->input('tanggal_akhir');
            $dateThreshold = $tanggalAwal;
            $currentdate = $tanggalAkhir;
            session(['dataThreshold' => $dateThreshold, 'currentdate' => $currentdate]);
        }
        foreach ($akunTransaksi->where('kelompok_akun_id', 3) as $akun) {
            $akunId = $akun->id;

            // Query Jurnal Umum berdasarkan akun_id
            $jurnalUmumQuery = JurnalUmum::where('akun_id', $akunId)->where('status', 'approved');

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
            $jurnalPenyesuaianQuery = JurnalPenyesuaian::where('akun_id', $akunId)->where('status', 'approved');

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

        // Loop untuk akun dengan kelompok_akun_id 4 (Pendapatan)
        foreach ($akunTransaksi->where('kelompok_akun_id', 4) as $akun) {
            $akunId = $akun->id;

            // Query Jurnal Umum berdasarkan akun_id
            $jurnalUmumQuery = JurnalUmum::where('akun_id', $akunId)->where('status', 'approved');

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
            $jurnalPenyesuaianQuery = JurnalPenyesuaian::where('akun_id', $akunId)->where('status', 'approved');

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

        // Loop untuk akun dengan kelompok_akun_id 6 (Beban)
        foreach ($akunTransaksi->where('kelompok_akun_id', 6) as $akun) {
            $akunId = $akun->id;

            // Query Jurnal Penyesuaian berdasarkan akun_id
            $jurnalPenyesuaianQuery = JurnalPenyesuaian::where('akun_id', $akunId)->where('status', 'approved');

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

            // Query Jurnal Umum berdasarkan akun_id untuk kelompok_akun_id 6
            $jurnalUmumQuery = JurnalUmum::where('akun_id', $akunId)->where('status', 'approved');

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
        }

        // Gabungkan hasil jurnal umum dan penyesuaian
        $combinedResults = $jurnalUmumResults->merge($jurnalPenyesuaianResults);
        Log::info('Combined Results:', $combinedResults->toArray());
        // Agregasi nilai berdasarkan akun_id
        $aggregatedResults = $combinedResults->groupBy('akun_id')->map(function ($group) {
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
        session(['aggregatedResults' => $aggregatedResults, 'akunTransaksi' => $akunTransaksi, ]);
        return view('admin.Ekuitas', compact('akunTransaksi', 'aggregatedResults'));
    }
    public function LabaRugi(Request $request)
    {
        $akunTransaksi = AkunTransaksi::whereIn('kelompok_akun_id', [4, 6])->where('status', 'approved')->get();

        // Koleksi untuk menyimpan hasil query dari semua akun
        $jurnalUmumResults = collect();
        $jurnalPenyesuaianResults = collect();

        $kriteria = $request->input('kriteria');
        $periode = $request->input('periode');
        $dateThreshold = null;

        // Tentukan tanggal threshold berdasarkan periode jika diperlukan
        if ($kriteria === 'periode') {
            $currentdate = Carbon::now()->toDateString();
            if ($periode == 1) {
                $dateThreshold = Carbon::now()->subYear()->toDateString();
            } elseif ($periode == 2) {
                $dateThreshold = Carbon::now()->subMonth()->toDateString();
            } elseif ($periode == 3) {
                $dateThreshold = Carbon::now()->subWeek()->toDateString();
            }
            session(['dataThreshold' => $dateThreshold, 'currentdate' => $currentdate]);
        } elseif ($kriteria === 'tanggal') {
            // Filter by specific date range
            $tanggalAwal = $request->input('tanggal_awal');
            $tanggalAkhir = $request->input('tanggal_akhir');
            $dateThreshold = $tanggalAwal;
            $currentdate = $tanggalAkhir;
            session(['dataThreshold' => $dateThreshold, 'currentdate' => $currentdate]);
        }

        // Loop untuk akun dengan kelompok_akun_id 4 (Pendapatan)
        foreach ($akunTransaksi->where('kelompok_akun_id', 4) as $akun) {
            $akunId = $akun->id;

            // Query Jurnal Umum berdasarkan akun_id
            $jurnalUmumQuery = JurnalUmum::where('akun_id', $akunId)->where('status', 'approved');

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
            $jurnalPenyesuaianQuery = JurnalPenyesuaian::where('akun_id', $akunId)->where('status', 'approved');

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

        // Loop untuk akun dengan kelompok_akun_id 6 (Beban)
        foreach ($akunTransaksi->where('kelompok_akun_id', 6) as $akun) {
            $akunId = $akun->id;

            // Query Jurnal Penyesuaian berdasarkan akun_id
            $jurnalPenyesuaianQuery = JurnalPenyesuaian::where('akun_id', $akunId)->where('status', 'approved');

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

            // Query Jurnal Umum berdasarkan akun_id untuk kelompok_akun_id 6
            $jurnalUmumQuery = JurnalUmum::where('akun_id', $akunId)->where('status', 'approved');

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
        }

        // Gabungkan hasil jurnal umum dan penyesuaian
        $combinedResults = $jurnalUmumResults->merge($jurnalPenyesuaianResults);
        Log::info('Combined Results:', $combinedResults->toArray());
        // Agregasi nilai berdasarkan akun_id
        $aggregatedResults = $combinedResults->groupBy('akun_id')->map(function ($group) {
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
        session(['aggregatedResults' => $aggregatedResults, 'akunTransaksi' => $akunTransaksi,]);
        // Return the view with the results
        return view('admin.LabaRugi', compact('akunTransaksi', 'aggregatedResults'));
    }

    public function PosisiKeuangan(Request $request)
    {
        $akunTransaksi = AkunTransaksi::where('status', 'approved')->get();
        $jurnalUmumResults = collect();
        $jurnalPenyesuaianResults = collect();

        $kriteria = $request->input('kriteria');
        $periode = $request->input('periode');
        $dateThreshold = null;

        // Tentukan tanggal threshold berdasarkan periode jika diperlukan
        // Tentukan tanggal threshold berdasarkan periode jika diperlukan
        if ($kriteria === 'periode') {
            $currentdate = Carbon::now()->toDateString();
            if ($periode == 1) {
                $dateThreshold = Carbon::now()->subYear()->toDateString();
            } elseif ($periode == 2) {
                $dateThreshold = Carbon::now()->subMonth()->toDateString();
            } elseif ($periode == 3) {
                $dateThreshold = Carbon::now()->subWeek()->toDateString();
            }
            session(['dataThreshold' => $dateThreshold, 'currentdate' => $currentdate]);
        } elseif ($kriteria === 'tanggal') {
            // Filter by specific date range
            $tanggalAwal = $request->input('tanggal_awal');
            $tanggalAkhir = $request->input('tanggal_akhir');
            $dateThreshold = $tanggalAwal;
            $currentdate = $tanggalAkhir;
            session(['dataThreshold' => $dateThreshold, 'currentdate' => $currentdate]);
        }
        foreach ($akunTransaksi as $akun) {
            $akunId = $akun->id;

            // Query Jurnal Umum berdasarkan akun_id
            $jurnalUmumQuery = JurnalUmum::where('akun_id', $akunId)->where('status', 'approved');
            $jurnalPenyesuaianQuery = JurnalPenyesuaian::where('akun_id', $akunId)->where('status', 'approved');


            // Filter berdasarkan kriteria dan periode
            if ($dateThreshold) {
                $jurnalUmumQuery->where('created_at', '>=', $dateThreshold);
                $jurnalPenyesuaianQuery->where('created_at', '>=', $dateThreshold);
            } elseif ($kriteria === 'tanggal') {
                $tanggalAwal = $request->input('tanggal_awal');
                $tanggalAkhir = $request->input('tanggal_akhir');

                if ($tanggalAwal && $tanggalAkhir) {
                    $jurnalUmumQuery->whereBetween('created_at', [$tanggalAwal, $tanggalAkhir]);
                    $jurnalPenyesuaianQuery->whereBetween('created_at', [$tanggalAwal, $tanggalAkhir]);
                }
            }

            // Gabungkan hasil query ke koleksi utama
            $jurnalUmumResults = $jurnalUmumResults->merge($jurnalUmumQuery->get());
            $jurnalPenyesuaianResults = $jurnalPenyesuaianResults->merge($jurnalPenyesuaianQuery->get());
        }
        $combinedResults = $jurnalUmumResults->merge($jurnalPenyesuaianResults);
        $aggregatedResults = $combinedResults->groupBy('akun_id')->map(function ($group) {
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
        session(['aggregatedResults' => $aggregatedResults, 'akunTransaksi' => $akunTransaksi,]);
        return view('admin.PosisiKeuangan', compact('akunTransaksi', 'aggregatedResults'));
    }
}
