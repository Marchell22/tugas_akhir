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
                Laporan Laba Rugi
            </h2>
        </div>
        <!-- Wrapping the table in a div to center it -->
        <div class="table-container">
            @php
                $totalPendapatan = 0;
                $bebanPendapatan = 0;
                $total = 0;
            @endphp
            <table class="full-width-table">
                <tbody>
                    <tr class="foreach-border">
                        <td colspan="3" style="font-weight:bold;">Pendapatan Perusahaan</td>
                    </tr>
                    @foreach ($akunTransaksi->where('kelompok_akun_id', 4) as $akun)
                        @php
                            $aggregated = $aggregatedResults->where('akun_id', $akun->id)->first();
                            $nilai = $aggregated ? $aggregated->nilai : 0;
                            $totalPendapatan += $nilai;
                        @endphp
                        <tr class="foreach-border">
                            <td>&nbsp; &nbsp; &nbsp; &nbsp;{{ $akun->nama }}</td>
                            <td class="text-right kiri">Rp. {{ number_format($nilai, 0, ',', '.') }}</td>
                            <td>-</td>
                        </tr>
                    @endforeach
                    <tr class="foreach-border">
                        <td style="text-align: end; font-weight:bold;">Jumlah Pendapatan</td>
                        <td class="text-right kiri">Rp. {{ number_format($totalPendapatan, 0, ',', '.') }}
                        </td>
                        <td class="text-right kanan" id="iktisar_laba_rugi_pendapatan">Rp.
                            {{ number_format($totalPendapatan, 0, ',', '.') }}</td>
                    </tr>
                    <tr class="foreach-border">
                        <td colspan="3" style="font-weight:bold;">Beban</td>
                    </tr>
                    @foreach ($akunTransaksi->where('kelompok_akun_id', 6) as $akun)
                        @php
                            $aggregated = $aggregatedResults->where('akun_id', $akun->id)->first();
                            $nilai = $aggregated ? $aggregated->nilai : 0;
                            $bebanPendapatan += $nilai;
                        @endphp
                        <tr class="foreach-border">
                            <td>&nbsp; &nbsp; &nbsp; &nbsp; {{ $akun->nama }}</td>
                            <td class="text-right kiri">Rp. {{ number_format($nilai, 0, ',', '.') }}</td>
                            <td>-</td>
                        </tr>
                    @endforeach
                    <tr class="foreach-border">
                        <td style="text-align: end; font-weight:bold;">Total Aktiva Tetap</td>
                        <td class="text-right kiri">Rp. {{ number_format($bebanPendapatan, 0, ',', '.') }}
                        </td>
                        <td class="text-right kanan" id="iktisar_laba_rugi_pendapatan">Rp.
                            {{ number_format($bebanPendapatan, 0, ',', '.') }}</td>
                    </tr>
                </tbody>
                <tfoot class="bg-primary text-white">
                    @php
                        $total = $totalPendapatan - $bebanPendapatan;
                    @endphp
                    <tr class="foreach-border">
                        <th class="text-right" colspan="2">Total</th>
                        <th class="text-right">Rp. {{ number_format($total, 0, ',', '.') }}</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</body>

</html>
