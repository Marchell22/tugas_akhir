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
                @if ($kategori == 1)
                    Neraca Lajur
                @elseif($kategori == 2)
                    Neraca Lajur Penyesuaian
                @elseif($kategori == 3)
                    Neraca Lajur Disesuaikan
                @else
                    {{ $kategori }}
                @endif
            </h2>
        </div>
        <!-- Wrapping the table in a div to center it -->
        <div class="table-container">
            @php
                $total = 0;
                $totalDebit = 0;
                $totalKredit = 0;
            @endphp
            <table class="full-width-table">
                <thead>
                    <tr>
                        <th rowspan="2" style="vertical-align: middle" class="text-center">Kode</th>
                        <th rowspan="2" style="vertical-align: middle" class="text-center">Nama</th>
                        <th colspan="2" class="text-center">Neraca Saldo</th>
                    </tr>
                    <tr>
                        <th class="text-center">Debit</th>
                        <th class="text-center">Kredit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($akunTransaksi as $d)
                        @php
                            $result = $results->where('akun_id', $d->id)->first();
                            $nilai = $result ? $result->nilai : 0;
                            if ($d->post_saldo == 2) {
                                $totalKredit += $nilai;
                            } elseif ($d->post_saldo == 1) {
                                $totalDebit += $nilai;
                            }
                        @endphp
                        <tr>
                            @if ($d->post_saldo == 2)
                                <td>{{ $d->kode }}</td>
                                <td>{{ $d->nama }}</td>
                                <td>-</td>
                                <td>{{ number_format($nilai, 0, ',', '.') }}</td>
                            @elseif($d->post_saldo == 1)
                                <td>{{ $d->kode }}</td>
                                <td>{{ $d->nama }}</td>
                                <td>{{ number_format($nilai, 0, ',', '.') }}</td>
                                <td>-</td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
                <tfoot class="">
                    <tr>
                        <th colspan="2" class="text-right">Jumlah</th>
                        <th>{{ number_format($totalDebit, 0, ',', '.') }}</th>
                        <th>{{ number_format($totalKredit, 0, ',', '.') }}</th>
                    </tr>
                    <tr>
                        @php
                            $total = $totalDebit - $totalKredit;
                        @endphp
                        <th colspan="2" class="text-right">Selisih</th>
                        <th colspan="2" class="text-right" id="selisih_neraca_saldo">
                            {{ number_format($total, 0, ',', '.') }}</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</body>

</html>
