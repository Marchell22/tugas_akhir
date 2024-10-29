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
                Perubahan Ekuitas
            </h2>
        </div>
        <section class="store-user mt-5">
            <div class="col-10">
                <div class="row extra-info pt-3">
                    <div class="col-7">
                        <p><strong>Tanggal Awal:</strong>
                            <span class="font-weight-900">{{ $dataThreshold }}</span>
                        </p>
                        <p><strong>Tanggal Akhir :</strong>
                            <span class="font-weight-900">{{ $currentdate }}</span>
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Wrapping the table in a div to center it -->
        <div class="table-container">
            @php
                $totalPendapatan = 0;
                $bebanPendapatan = 0;
                $total = 0;
                $totalModal = 0;
                $totalPrive = 0;
            @endphp
            @php
                $totalPendapatan = 0;
                $bebanPendapatan = 0;

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
            <table class="full-width-table">
                <tbody>
                    @foreach ($akunTransaksi->where('kelompok_akun_id', 3) as $akun)
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
                            <tr class="foreach-border">
                                <td>{{ $akun->nama }}</td>
                                <td class="text-right modal_neraca_saldo_debit">Rp.
                                    {{ number_format($nilai, 0, ',', '.') }}</td>
                                <td class="text-right modal_neraca_saldo_kredit">-</td>
                                <td>-</td>
                            </tr>
                        @elseif($akun->post_saldo == 1)
                            <tr class="foreach-border">
                                <td>{{ $akun->nama }}</td>
                                <td class="text-right modal_neraca_saldo_debit">-</td>
                                <td class="text-right modal_neraca_saldo_kredit">Rp.
                                    {{ number_format($nilai, 0, ',', '.') }}</td>
                                <td>-</td>
                            </tr>
                        @endif
                    @endforeach
                    <tr class="foreach-border">
                        <td>Laba Bersih</td>
                        <td class="text-right modal_neraca_saldo_debit">Rp.
                            {{ number_format($total, 0, ',', '.') }}</td>
                        <td class="text-right modal_neraca_saldo_kredit">-</td>
                        <td>-</td>
                    </tr>
                    @php
                        $totalDebit = $totalModal + $total;
                        $totalKredit = $totalPrive;
                        $totalSemua = $totalDebit - $totalKredit;
                    @endphp
                    <tr class="foreach-border">
                        <th class="text-right">Total Modal</th>
                        <th class="text-right" id="jumlah_modal_debit">
                            {{ number_format($totalDebit, 0, ',', '.') }}</th>
                        <th class="text-right" id="jumlah_modal_kredit">
                            {{ number_format($totalKredit, 0, ',', '.') }}</th>
                        <th class="text-right" id="jumlah_modal">
                            {{ number_format($totalSemua, 0, ',', '.') }}</th>
                    </tr>
                </tbody>
                <tfoot class="bg-primary text-white">
                    <tr class="foreach-border">
                        <th colspan="3" class="text-right">Total Modal</th>
                        <th class="text-right" id="total_modal">
                            {{ number_format($totalSemua, 0, ',', '.') }}</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</body>

</html>
