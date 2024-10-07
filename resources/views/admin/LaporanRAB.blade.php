<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <!-- Custom Style -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('tmplt/src/plugins/datatables/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('tmplt/src/plugins/datatables/css/responsive.bootstrap4.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('tmplt/vendors/styles/style.css') }}">

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
    <title>Laporan Rancangan Anggaran Biaya</title>
    <style>
        :root {
            --body-bg: rgb(204, 204, 204);
            --white: #ffffff;
            --darkWhite: #ccc;
            --black: #000000;
            --dark: #615c60;
            --themeColor: #22b8d1;
            --pageShadow: 0 0 0.5cm rgba(0, 0, 0, 0.5);
        }

        /* Font Include */
        @import url('https://fonts.googleapis.com/css2?family=Rajdhani:wght@600&display=swap');

        body {
            background-color: var(--body-bg);
        }

        .page {
            background: var(--white);
            display: block;
            margin: 0 auto;
            position: relative;
            box-shadow: var(--pageShadow);
        }

        .page[size="A4"] {
            width: 21cm;
            height: 29.7cm;
            overflow: hidden;
        }

        .bb {
            border-bottom: 3px solid var(--darkWhite);
        }

        /* Top Section */
        .top-content {
            padding-bottom: 15px;
        }

        .logo img {
            height: 60px;
        }

        .top-left p {
            margin: 0;
        }

        .top-left .graphic-path {
            height: 40px;
            position: relative;
        }

        .top-left .graphic-path::before {
            content: "";
            height: 20px;
            background-color: var(--dark);
            position: absolute;
            left: 15px;
            right: 0;
            top: -15px;
            z-index: 2;
        }

        .top-left .graphic-path::after {
            content: "";
            height: 22px;
            width: 17px;
            background: var(--black);
            position: absolute;
            top: -13px;
            left: 6px;
            transform: rotate(45deg);
        }

        .top-left .graphic-path p {
            color: var(--white);
            height: 40px;
            left: 0;
            right: -100px;
            text-transform: uppercase;
            background-color: var(--themeColor);
            font: 26px;
            z-index: 3;
            position: absolute;
            padding-left: 10px;
        }

        /* User Store Section */
        .store-user {
            padding-bottom: 25px;
        }

        .store-user p {
            margin: 0;
            font-weight: 600;
        }

        .store-user .address {
            font-weight: 400;
        }

        .store-user h2 {
            color: var(--themeColor);
            font-family: 'Rajdhani', sans-serif;
        }

        .extra-info p span {
            font-weight: 400;
        }

        /* Product Section */
        thead {
            color: var(--white);
            background: var(--themeColor);
        }

        .table td,
        .table th {
            text-align: center;
            vertical-align: middle;
        }

        tr th:first-child,
        tr td:first-child {
            text-align: left;
        }

        .media img {
            height: 60px;
            width: 60px;
        }

        .media p {
            font-weight: 400;
            margin: 0;
        }

        .media p.title {
            font-weight: 600;
        }

        /* Balance Info Section */
        .balance-info .table td,
        .balance-info .table th {
            padding: 0;
            border: 0;
        }

        .balance-info tr td:first-child {
            font-weight: 600;
        }

        tfoot {
            border-top: 2px solid var(--darkWhite);
        }

        tfoot td {
            font-weight: 600;
        }

        /* Cart BG */
        .cart-bg {
            height: 250px;
            bottom: 32px;
            left: -40px;
            opacity: 0.3;
            position: absolute;
        }

        /* Footer Section */
        footer {
            text-align: center;
            position: absolute;
            bottom: 30px;
            left: 75px;
        }

        footer hr {
            margin-bottom: -22px;
            border-top: 3px solid var(--darkWhite);
        }

        footer a {
            color: var(--themeColor);
        }

        footer p {
            padding: 6px;
            border: 3px solid var(--darkWhite);
            background-color: var(--white);
            display: inline-block;
        }
    </style>
</head>

<body>
    <div class="my-5 page" size="A4">
        <div class="p-5">
            <section class="top-content bb d-flex justify-content-between">
                <div class="logo">
                    <img src="" alt="" class="img-fluid">
                </div>
                <div class="top-left">
                    <div class="graphic-path">
                        <p style="font-size:13px">Rencana Anggaran <br> Biaya
                        </p>
                    </div>
                    <div class="position-relative">
                        <p>PT <span>Sinar Kaliman Sehat</span></p>
                    </div>
                </div>
            </section>

            <section class="store-user mt-5">
                <div class="col-10">
                    
                    <div class="row extra-info pt-3">
                        <div class="col-7">
                            <p>Bidang: <span> {{ $rencanaAnggaranBiaya->bidang }}</span></p>
                            <p>Kegiatan: <span>{{ $rencanaAnggaranBiaya->kegiatan }}</span></p>
                        </div>
                        <div class="col-6">
                            <p>Waktu Pelaksanaan: <span>{{ $rencanaAnggaranBiaya->waktu_pelaksanaan }}</span></p>
                            <p>Output: <span>{{ $rencanaAnggaranBiaya->output }}</span></p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="product-area mt-4">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Uraian Pekerjaan</td>
                            <td>Satuan</td>
                            <td>Volume</td>
                            <td>Harga Satuan</td>
                            <td>Total Harga</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($uraianPekerjaan as $uraian)
                            <tr>
                                <td>
                                    {{ $uraian['id'] }}
                                </td>
                                <td>{{ $uraian['uraian_pekerjaan'] }}</td>
                                <td>{{ $uraian['satuan'] }}</td>
                                <td>{{ $uraian['volume'] }}</td>
                                <td>{{ $uraian['harga_satuan'] }}</td>
                                <td>{{ $uraian['total_harga'] }}</td>
                        @endforeach
                        </tr>
                    </tbody>
                </table>
            </section>

            
            <!-- Cart BG -->
            <img src="" class="img-fluid cart-bg" alt="">

          
        </div>
    </div>
</body>

</html>
