<!DOCTYPE html>
<html>

<head>
    <title> KOP SURAT </title>
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
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
            line-height: 3px;
        }

        .table {
            border-bottom: 3px solid #000;
            padding: 5px;
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
            margin: 20mm;
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
                    <b style="margin-bottom: 20px">Jl. Anggrek Raya no. 10 a-b Cengkareng Barat, </b><br>
                    <b>Jakarta Barat, Jakarta 11720</b>
                    <b style="margin-top: 35px; display: inline-block;">Telp. 6285693902293</b>

                </td>
            </tr>
        </table>
        <div style="text-align:center; margin-top: 20px;">
            <h2>Rancangan Anggaran Biaya</h2>
        </div>
        <section class="store-user mt-5">
            <div class="col-10">
                <div class="row extra-info pt-3">
                    <div class="col-7">
                        <p><strong>Bidang &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong> :
                            <span>{{ $rencanaAnggaranBiaya->bidang }}</span>
                        </p>
                        <p><strong>Kegiatan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong> :
                            <span>{{ $rencanaAnggaranBiaya->kegiatan }}</span>
                        </p>

                        <p><strong>Periode &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong> :
                            <span>{{ $rencanaAnggaranBiaya->waktu_pelaksanaan }}</span>
                        </p>
                        <p><strong>Output
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>:
                            <span>{{ $rencanaAnggaranBiaya->output }}</span>
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Wrapping the table in a div to center it -->
        <div class="table-container">
            <table class="full-width-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Akun Transaksi</th>
                        <th>Uraian</th>
                        <th>Satuan</th>
                        <th>Volume</th>
                        <th>Harga Satuan</th>
                        <th>Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($uraianPekerjaan as $index => $uraian)
                        <tr class="foreach-border">
                            <td>{{ $index + 1 }}</td> <!-- Menampilkan urutan nomor dimulai dari 1 -->
                            <td>
                                @php
                                    $akun = $akunTransaksis->firstWhere('id', $uraian['akun_id']);
                                @endphp
                                {{ $akun ? $akun->nama : 'Nama Akun Tidak Ditemukan' }}
                            </td>
                            <td>{{ $uraian['uraian_pekerjaan'] }}</td>
                            <td>{{ $uraian['satuan'] }}</td>
                            <td>{{ $uraian['volume'] }}</td>
                            <td>Rp {{ number_format($uraian['harga_satuan'], 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($uraian['total_harga'], 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    @php
                        $totalJumlah = array_sum(array_column($uraianPekerjaan, 'total_harga'));
                    @endphp
                    <tr>
                        <td colspan="6" style="text-align: right; font-weight: bold;">Total Jumlah:</td>
                        <td style="font-weight: bold; text-align: center; vertical-align: middle;">
                            Rp {{ number_format($totalJumlah, 0, ',', '.') }}
                        </td>

                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</body>

</html>
