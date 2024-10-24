<!DOCTYPE html>
<html>

<head>
    <title> KOP SURAT </title>
    
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
            margin-top: 2cm;
            margin-left: 2cm;
            margin-right: 2cm;
            margin-bottom: 2cm;
        }

        .rangkasurat {
            width: 100%;
            max-width: 210mm;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            height: auto;
        }

        .tengah {
            text-align: center;
            line-height: 5px;
        }

        .table {
            border-bottom: 3px solid #000;
            padding: 2px;
            margin: 0 auto;
        }

        /* Table container to center the table */
        .table-container {
            display: flex;
            justify-content: center;
            width: 100%;
        }

        .foreach-border td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        /* Ensuring the table takes full width and has fixed layout */
        .full-width-table {
            width: 100%;
            table-layout: fixed;
            /* Ensures equal column widths */
            border-collapse: collapse;
        }

        /* Border for the table cells */
        .full-width-table th,
        .full-width-table td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }

        /* Style for A4 compatibility */
        @page {
            size: A4;
            margin: 0mm 0mm 0mm 0mm;
        }
    </style>
</head>

<body>
    <div class="rangkasurat">
        <table class="table" width="100%">
            <tr>
                <td><img src="{{ public_path('tmplt/vendors/images/sks.png') }}" width="160px"></td>
                <td class="tengah">
                    <h1>PT. SINAR KALIMAN SEHAT</h1>
                    <h3>Produsen dan Distributor Obat Herbal</h3>
                    <b>Jl. Anggrek Raya no. 10 a-b Cengkareng Barat, Jakarta Barat,</b><br>
                    <b style="margin-top: 18px; display: inline-block;">Jakarta 11720</b>
                    <b style="margin-top: 18px; ">Telp. 6285693902293</b>

                </td>
            </tr>
        </table>
        <div style="text-align:center; margin-top: 20px;">
            <h2>
                Laporan Posisi Keuangan
            </h2>
        </div>
        <!-- Wrapping the table in a div to center it -->
        <div class="table-container">
            @php
                $totalAktivaLancarDebit = 0;
                $totalAktivaLancarKredit = 0;
                $totalAktivaTetapDebit = 0;
                $totalAktivaTetapKredit = 0;
                $totalUtangLancarDebit = 0;
                $totalUtangLancarKredit = 0;
                $totalUtangTetapDebit = 0;
                $totalUtangTetapKredit = 0;
            @endphp
            <table class="full-width-table">
                <tbody>
                    <thead class="bg-primary text-white">
                        <tr>
                            <th colspan="5" class="text-center">Aktiva</th>
                        </tr>
                    </thead>
                    <tr>
                        <th colspan="5" style="text-align: left;">Aktiva Lancar</th>
                    </tr>
                    @foreach ($akunTransaksi as $akun)
                        @if ($akun->kelompok_laporan_posisi_keuangan == 1 && $akun->kelompok_akun_id == 1)
                            @php
                                $aggregated = $aggregatedResults->where('akun_id', $akun->id)->first();
                                $nilai = $aggregated ? $aggregated->nilai : 0;
                                if ($akun->post_saldo == 2) {
                                    $totalAktivaLancarKredit += $nilai;
                                } elseif ($akun->post_saldo == 1) {
                                    $totalAktivaLancarDebit += $nilai;
                                }
                            @endphp
                            @if ($akun->post_saldo == 1)
                                <tr>
                                    <td colspan="2">{{ $akun->nama }}</td>
                                    <td class="text-right aktiva_lancar_neraca_saldo_debit">
                                        Rp.{{ number_format($nilai, 0, ',', '.') }}
                                    </td>
                                    <td class="text-right aktiva_lancar_neraca_saldo_kredit">
                                    </td>
                                    <td></td>
                                </tr>
                            @elseif($akun->post_saldo == 2)
                                <tr>
                                    <td colspan="2">{{ $akun->nama }}</td>
                                    <td class="text-right aktiva_lancar_neraca_saldo_debit">
                                        -
                                    </td>
                                    <td class="text-right aktiva_lancar_neraca_saldo_kredit">
                                        Rp.{{ number_format($nilai, 0, ',', '.') }}
                                    </td>
                                    <td></td>
                                </tr>
                            @endif
                        @endif
                    @endforeach
                    @php
                        $totalAktivaLancar = $totalAktivaLancarDebit - $totalAktivaLancarKredit;
                    @endphp
                    <tr>
                        <th colspan="2" class="text-right">Total Aktiva Lancar</th>
                        <th class="text-right" id="jumlah_aktiva_lancar_debit">
                            Rp.{{ number_format($totalAktivaLancarDebit, 0, ',', '.') }}</th>
                        <th class="text-right" id="jumlah_aktiva_lancar_kredit">
                            Rp.{{ number_format($totalAktivaLancarKredit, 0, ',', '.') }}</th>
                        <th class="text-right" id="jumlah_aktiva_lancar">
                            Rp.{{ number_format($totalAktivaLancar, 0, ',', '.') }}</th>
                    </tr>
                    <tr>
                        <th colspan="5" style="text-align: left;">Aktiva Tetap</th>
                    </tr>
                    @foreach ($akunTransaksi as $akun)
                        @if ($akun->kelompok_laporan_posisi_keuangan == 2 && $akun->kelompok_akun_id == 1)
                            @php
                                $aggregated = $aggregatedResults->where('akun_id', $akun->id)->first();
                                $nilai = $aggregated ? $aggregated->nilai : 0;
                                if ($akun->post_saldo == 2) {
                                    $totalAktivaTetapKredit += $nilai;
                                } elseif ($akun->post_saldo == 1) {
                                    $totalAktivaTetapDebit += $nilai;
                                }
                            @endphp
                            @if ($akun->post_saldo == 1)
                                <tr>
                                    <td colspan="2">{{ $akun->nama }}</td>
                                    <td class="text-right aktiva_lancar_neraca_saldo_debit">
                                        Rp.
                                        {{ number_format($nilai, 0, ',', '.') }}
                                    </td>
                                    <td class="text-right aktiva_lancar_neraca_saldo_kredit">-
                                    </td>
                                    <td></td>
                                </tr>
                            @elseif($akun->post_saldo == 2)
                                <tr>
                                    <td colspan="2">{{ $akun->nama }}</td>
                                    <td class="text-right aktiva_lancar_neraca_saldo_debit">
                                        -
                                    </td>
                                    <td class="text-right aktiva_lancar_neraca_saldo_kredit">
                                        Rp.{{ number_format($nilai, 0, ',', '.') }}
                                    </td>
                                    <td></td>
                                </tr>
                            @endif
                        @endif
                    @endforeach
                    @php
                        $totalAktivaTetap = $totalAktivaTetapDebit - $totalAktivaTetapKredit;
                    @endphp
                    <tr>
                        <th colspan="2" class="text-right">Total Aktiva Tetap</th>
                        <th class="text-right" id="jumlah_aktiva_tetap_debit">
                            Rp.{{ number_format($totalAktivaTetapDebit, 0, ',', '.') }}</th>
                        <th class="text-right" id="jumlah_aktiva_tetap_kredit">
                            Rp.{{ number_format($totalAktivaTetapKredit, 0, ',', '.') }}</th>
                        <th class="text-right" id="jumlah_aktiva_tetap">
                            Rp.{{ number_format($totalAktivaTetap, 0, ',', '.') }}</th>
                    </tr>
                </tbody>
                @php
                    $totalAktiva = $totalAktivaTetap + $totalAktivaLancar;
                @endphp
                <tfoot class="bg-primary text-white">
                    <tr>
                        <th colspan="4" class="text-right">Total Aktiva</th>
                        <th class="text-right" id="total_aktiva">
                            Rp.{{ number_format($totalAktiva, 0, ',', '.') }}</th>
                    </tr>
                </tfoot>
            </table>
            <br><br><br><br><br><br>

            <table class="full-width-table">
                <thead class="bg-primary text-white">
                    <tr>
                        <th colspan="5" class="text-center">Kewajiban Dan Modal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th colspan="5" style="text-align: left;">Utang Lancar</th>
                    </tr>
                    @foreach ($akunTransaksi as $akun)
                        @if ($akun->kelompok_laporan_posisi_keuangan == 3 && $akun->kelompok_akun_id == 2)
                            @php
                                $aggregated = $aggregatedResults->where('akun_id', $akun->id)->first();
                                $nilai = $aggregated ? $aggregated->nilai : 0;
                                if ($akun->post_saldo == 2) {
                                    $totalUtangLancarKredit += $nilai;
                                } elseif ($akun->post_saldo == 1) {
                                    $totalUtangLancarDebit += $nilai;
                                }
                            @endphp
                            @if ($akun->post_saldo == 2)
                                <tr>
                                    <td colspan="2">{{ $akun->nama }}</td>
                                    <td class="text-right aktiva_lancar_neraca_saldo_debit">
                                        Rp.{{ number_format($nilai, 0, ',', '.') }}
                                    </td>
                                    <td class="text-right aktiva_lancar_neraca_saldo_kredit">
                                        -</td>
                                    <td></td>
                                </tr>
                            @elseif($akun->post_saldo == 1)
                                <tr>
                                    <td colspan="2">{{ $akun->nama }}</td>
                                    <td class="text-right aktiva_lancar_neraca_saldo_debit">
                                        -
                                    </td>
                                    <td class="text-right aktiva_lancar_neraca_saldo_kredit">
                                        Rp.{{ number_format($nilai, 0, ',', '.') }}
                                    </td>
                                    <td></td>
                                </tr>
                            @endif
                        @endif
                    @endforeach
                    @php
                        $totalUtangLancar = $totalUtangLancarKredit - $totalUtangLancarDebit;
                    @endphp
                    <tr>
                        <th colspan="2" class="text-right">Total Utang Lancar</th>
                        <th class="text-right" id="jumlah_utang_lancar_debit">
                            Rp.{{ number_format($totalUtangLancarKredit, 0, ',', '.') }}</th>
                        <th class="text-right" id="jumlah_utang_lancar_kredit">
                            Rp.{{ number_format($totalUtangLancarDebit, 0, ',', '.') }}</th>
                        <th class="text-right" id="jumlah_utang_lancar">
                            Rp.{{ number_format($totalUtangLancar, 0, ',', '.') }}</th>
                    </tr>
                    <tr>
                        <th colspan="5" style="text-align: left;">Utang Tetap</th>
                    </tr>
                    @foreach ($akunTransaksi as $akun)
                        @if ($akun->kelompok_laporan_posisi_keuangan == 4 && $akun->kelompok_akun_id == 2)
                            @php
                                $aggregated = $aggregatedResults->where('akun_id', $akun->id)->first();
                                $nilai = $aggregated ? $aggregated->nilai : 0;
                                if ($akun->post_saldo == 2) {
                                    $totalUtangTetapKredit += $nilai;
                                } elseif ($akun->post_saldo == 1) {
                                    $totalUtangTetapDebit += $nilai;
                                }
                            @endphp
                            @if ($akun->post_saldo == 2)
                                <tr>
                                    <td colspan="2">{{ $akun->nama }}</td>
                                    <td class="text-right aktiva_lancar_neraca_saldo_debit">
                                        Rp.{{ number_format($nilai, 0, ',', '.') }}
                                    </td>
                                    <td class="text-right aktiva_lancar_neraca_saldo_kredit">
                                        -</td>
                                    <td></td>
                                </tr>
                            @elseif($akun->post_saldo == 1)
                                <tr>
                                    <td colspan="2">{{ $akun->nama }}</td>
                                    <td class="text-right aktiva_lancar_neraca_saldo_debit">
                                        -
                                    </td>
                                    <td class="text-right aktiva_lancar_neraca_saldo_kredit">
                                        Rp.{{ number_format($nilai, 0, ',', '.') }}
                                    </td>
                                    <td></td>
                                </tr>
                            @endif
                        @endif
                    @endforeach
                    @php
                        $totalUtangTetap = $totalUtangTetapKredit - $totalUtangTetapDebit;
                    @endphp
                    <tr>
                        <th colspan="2" class="text-right">Total Utang Tetap</th>
                        <th class="text-right" id="jumlah_utang_tetap_debit">
                            Rp.{{ number_format($totalUtangTetapKredit, 0, ',', '.') }}</th>
                        <th class="text-right" id="jumlah_utang_tetap_kredit">
                            Rp.{{ number_format($totalUtangTetapDebit, 0, ',', '.') }}</th>
                        <th class="text-right" id="jumlah_utang_tetap">
                            Rp.{{ number_format($totalUtangTetap, 0, ',', '.') }}</th>
                    </tr>
                    <tr>
                        <th colspan="5" style="text-align: left;">Modal</th>
                    </tr>
                    @php
                        $totalPendapatan = 0;
                        $bebanPendapatan = 0;
                        $totalModal = 0;
                        $totalPrive = 0;

                        // Menghitung total pendapatan
                        $totalPendapatan = $akunTransaksi
                            ->where('kelompok_akun_id', 4)
                            ->sum(function ($akun) use ($aggregatedResults) {
                                $aggregated = $aggregatedResults->where('akun_id', $akun->id)->first();
                                return $aggregated ? $aggregated->nilai : 0;
                            });

                        // Menghitung total beban pendapatan
                        $bebanPendapatan = $akunTransaksi
                            ->where('kelompok_akun_id', 6)
                            ->sum(function ($akun) use ($aggregatedResults) {
                                $aggregated = $aggregatedResults->where('akun_id', $akun->id)->first();
                                return $aggregated ? $aggregated->nilai : 0;
                            });

                        // Menghitung total
                        $total = $totalPendapatan - $bebanPendapatan;
                    @endphp
                    @foreach ($akunTransaksi as $akun)
                        @if ($akun->kelompok_akun_id == 3)
                            @php
                                $aggregated = $aggregatedResults->where('akun_id', $akun->id)->first();
                                $nilai = $aggregated ? $aggregated->nilai : 0;
                                if ($akun->post_saldo == 2) {
                                    $totalModal += $nilai;
                                } elseif ($akun->post_saldo == 1) {
                                    $totalPrive += $nilai;
                                }
                            @endphp
                            @if ($akun->post_saldo == 2)
                                <tr>
                                    <td colspan="2">{{ $akun->nama }}</td>
                                    <td class="text-right aktiva_lancar_neraca_saldo_debit">
                                        Rp.
                                        {{ number_format($nilai, 0, ',', '.') }}
                                    </td>
                                    <td class="text-right aktiva_lancar_neraca_saldo_kredit">
                                    </td>
                                    <td></td>
                                </tr>
                            @elseif($akun->post_saldo == 1)
                                <tr>
                                    <td colspan="2">{{ $akun->nama }}</td>
                                    <td class="text-right aktiva_lancar_neraca_saldo_debit">
                                    </td>
                                    <td class="text-right aktiva_lancar_neraca_saldo_kredit">
                                        Rp.
                                        {{ number_format($nilai, 0, ',', '.') }}
                                    </td>
                                    <td></td>
                                </tr>
                            @endif
                        @endif
                    @endforeach

                    <tr>
                        <td colspan="2">Laba Bersih</td>
                        <td class="text-right modal_neraca_saldo_debit">
                            Rp.{{ number_format($total, 0, ',', '.') }}</td>
                        <td class="text-right modal_neraca_saldo_kredit"></td>
                        <td></td>
                    </tr>
                    @php
                        $jumlahModalDebit = $total + $totalModal;
                        $jumlahModalKredit = $totalPrive;
                        $jumlahSemuaModal = $jumlahModalDebit - $jumlahModalKredit;
                    @endphp
                    <tr>
                        <th colspan="2" class="text-right">Total Modal</th>
                        <th class="text-right" id="jumlah_modal_debit">
                            Rp.{{ number_format($jumlahModalDebit, 0, ',', '.') }}</th>
                        <th class="text-right" id="jumlah_modal_kredit">
                            Rp.{{ number_format($jumlahModalKredit, 0, ',', '.') }}</th>
                        <th class="text-right" id="jumlah_modal">
                            Rp.{{ number_format($jumlahSemuaModal, 0, ',', '.') }}</th>
                    </tr>
                </tbody>
                <tfoot class="bg-primary text-white">
                    @php
                        $totalKeseluruhan = $totalUtangTetap + $totalUtangLancar + $jumlahSemuaModal;
                    @endphp
                    <tr>
                        <th colspan="4" class="text-right">Total Kewajiban Dan Modal</th>
                        <th class="text-right" id="total_modal">
                            Rp.{{ number_format($totalKeseluruhan, 0, ',', '.') }}</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</body>

</html>
