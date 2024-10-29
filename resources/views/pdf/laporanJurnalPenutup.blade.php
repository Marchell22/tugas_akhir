<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> KOP SURAT </title>
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('tmplt/vendors/images/sks.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('tmplt/vendors/images/sks.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('tmplt/vendors/images/sks.png') }}">
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('tmplt/vendors/styles/core.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('tmplt/vendors/styles/icon-font.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('tmplt/src/plugins/datatables/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('tmplt/src/plugins/datatables/css/responsive.bootstrap4.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('tmplt/vendors/styles/style.css') }}">

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-119386393-1');
    </script>

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
                Jurnal Penutup
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
            <table class="full-width-table">
                @php
                    $totalPendapatan = 0;
                    $bebanPendapatan = 0;
                    $total = 0;
                    $totalModal = 0;
                    $totalPrive = 0;
                    $totalKiri = 0;
                    $totalKanan = 0;
                @endphp
                <tbody>
                    @foreach ($akunTransaksi->where('kelompok_akun_id', 4) as $akun)
                        @php
                            $aggregated = $aggregatedResults->where('akun_id', $akun->id)->first();
                            $nilai = $aggregated ? $aggregated->nilai : 0;
                            $totalPendapatan += $nilai;
                            $totalKiri += $nilai;
                        @endphp
                        <tr>
                            <td style="text-align: left;">{{ $akun->nama }}</td>
                            <td class="text-right kiri">Rp.
                                {{ number_format($nilai, 0, ',', '.') }}</td>
                            <td class="text-right kanan">-</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td style="text-align: center;"> Iktisar Laba-Rugi</td>
                        <td class="text-right kiri">-</td>
                        <td class="text-right kanan">Rp.
                            {{ number_format($totalPendapatan, 0, ',', '.') }}</td>
                        @php
                            $totalKanan += $totalPendapatan; // Hitung total kanan
                        @endphp
                    </tr>
                    @foreach ($akunTransaksi->where('kelompok_akun_id', 6) as $akun)
                        @php
                            $aggregated = $aggregatedResults->where('akun_id', $akun->id)->first();
                            $nilai = $aggregated ? $aggregated->nilai : 0;
                            $bebanPendapatan += $nilai;
                            $totalKiri += $nilai;
                        @endphp
                    @endforeach
                    <tr>
                        <td style="text-align: left;">Iktisar Laba Rugi</td>
                        <td class="text-right kiri">Rp. {{ number_format($bebanPendapatan, 0, ',', '.') }}
                        </td>
                        <td class="text-right kanan">-</td>
                    </tr>
                    @foreach ($akunTransaksi->where('kelompok_akun_id', 6) as $akun)
                        @php
                            $aggregated = $aggregatedResults->where('akun_id', $akun->id)->first();
                            $nilai = $aggregated ? $aggregated->nilai : 0;
                            $bebanPendapatan += $nilai;
                        @endphp
                        <tr>
                            <td style="text-align: center;"> {{ $akun->nama }}</td>
                            <td class="text-right kiri">-</td>
                            <td class="text-right kanan">Rp. {{ number_format($nilai, 0, ',', '.') }}</td>
                            @php
                                $totalKanan += $nilai; // Hitung total kanan
                            @endphp
                        </tr>
                    @endforeach
                    @foreach ($akunTransaksi->where('nama', 'Modal') as $akun)
                        @php
                            $aggregated = $aggregatedResults->where('akun_id', $akun->id)->first();
                            $nilai = $aggregated ? $aggregated->nilai : 0;
                            $totalModal += $nilai;
                            $totalKiri += $nilai;
                        @endphp
                        <tr>
                            <td style="text-align: left;">{{ $akun->nama }}</td>
                            <td class="text-right kiri">Rp. {{ number_format($nilai, 0, ',', '.') }}</td>
                            <td class="text-right kanan">-</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td style="text-align: center;">Iktisar Laba Rugi</td>
                        <td class="text-right kiri">-</td>
                        <td class="text-right kanan">Rp. {{ number_format($totalModal, 0, ',', '.') }}
                            @php
                                $totalKanan += $totalModal; // Hitung total kanan
                            @endphp
                        </td>
                    </tr>
                    @foreach ($akunTransaksi->where('nama', 'Prive') as $akun)
                        @php
                            $aggregated = $aggregatedResults->where('akun_id', $akun->id)->first();
                            $nilai = $aggregated ? $aggregated->nilai : 0;
                            $totalKiri += $nilai;
                        @endphp
                    @endforeach
                    <tr>
                        <td style="text-align: left;">Modal</td>
                        <td class="text-right kiri">Rp. {{ number_format($nilai, 0, ',', '.') }}</td>
                        <td class="text-right kanan">-</td>
                    </tr>
                    @foreach ($akunTransaksi->where('nama', 'Prive') as $akun)
                        @php
                            $aggregated = $aggregatedResults->where('akun_id', $akun->id)->first();
                            $nilai = $aggregated ? $aggregated->nilai : 0;
                            $totalPrive += $nilai;
                        @endphp
                        <tr>
                            <td style="text-align: center;"> {{ $akun->nama }}</td>
                            <td class="text-right kiri">-</td>
                            <td class="text-right kanan">Rp. {{ number_format($totalPrive, 0, ',', '.') }}
                            </td>
                            @php
                                $totalKanan += $totalPrive; // Hitung total kanan
                            @endphp
                        </tr>
                    @endforeach
                </tbody>
                <tfoot class="bg-primary text-white">
                    <tr>
                        <th class="text-right">Total</th>
                        <th class="text-right kiri">Rp.{{ number_format($totalKiri, 0, ',', '.') }}</th>
                        <th class="text-right kanan">Rp.{{ number_format($totalKanan, 0, ',', '.') }}</th>
                    </tr>
                </tfoot>
            </table>

        </div>
    </div>

</body>


</html>
