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
            <h2>Buku Besar</h2>
        </div>
        @if ($results->isNotEmpty())
            @php
                $nilai = 0;
                $akunTransaksi = $akunTransaksiList->find($results->first()->akun_id);
            @endphp
            <section class="store-user mt-5">
                <div class="col-10">
                    <div class="row extra-info pt-3">
                        <div class="col-7">
                            <p><strong>Nama Akun :</strong>
                                <span class="font-weight-900">{{ $akunTransaksi->nama }}</span>
                            </p>
                            <p><strong>Kode Akun :</strong>
                                <span class="font-weight-900">{{ $akunTransaksi->kode }}</span>
                            </p>
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
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Keterangan</th>
                            <th>Debit</th>
                            <th>Kredit</th>
                            <th>Saldo Debit</th>
                            <th>Saldo Kredit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($results as $result)
                            @php
                                if ($result['debit_atau_kredit'] == $akunTransaksi->post_saldo) {
                                    $nilai += $result['nilai'];
                                } else {
                                    $nilai -= $result['nilai'];
                                }
                            @endphp
                            <tr class="foreach-border">
                                <td>{{ $result->created_at }}</td>
                                <td>{{ $result->keterangan }}</td>
                                <td>{{ $result->debit_atau_kredit == 1 ? 'Rp. ' . substr(number_format($result->nilai, 2, ',', '.'), 0, -3) : '-' }}
                                </td>
                                <td>{{ $result->debit_atau_kredit == 2 ? 'Rp. ' . substr(number_format($result->nilai, 2, ',', '.'), 0, -3) : '-' }}
                                </td>
                                <td>{{ $akunTransaksi->post_saldo == 1 ? 'Rp. ' . substr(number_format($nilai, 2, ',', '.'), 0, -3) : '-' }}
                                </td>
                                <td>{{ $akunTransaksi->post_saldo == 2 ? 'Rp. ' . substr(number_format($nilai, 2, ',', '.'), 0, -3) : '-' }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    </div>
    @endif
</body>

</html>
