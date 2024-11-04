<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>Sistem Informasi Akutansi - PT Sinar Kaliman Sehat</title>

    <!-- Site favicon -->
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
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-119386393-1');
    </script>
    <style>
        /* Mengubah ukuran font pada .user-name */
        .user-name-header {
            font-size: 20px;
            /* Ganti dengan ukuran yang diinginkan */
            font-weight: bold;
            /* Membuat teks menjadi bold, jika diperlukan */
            text-align: center;
        }

        .container {
            flex: 1;
            display: flex;
            justify-content: flex-end;
            align-items: flex-end;
        }

        .search-container {
            /* margin: 20px; */
            margin-bottom: 10px;
        }

        /*
  .form-control {
  width: 200px;
  padding: 5px;
  font-size: 14px;
  } */
    </style>

<body>
    <div class="pre-loader">
        <div class="pre-loader-box">
            <div class="loader-logo"><img src="{{ asset('tmplt/vendors/images/loading.png') }}" alt=""></div>
            <div class='loader-progress' id="progress_div">
                <div class='bar' id='bar1'></div>
            </div>
            <div class='percent' id='percent1'>0%</div>
            <div class="loading-text">
                Loading...
            </div>
        </div>
    </div>

    <div class="header">
        <div class="header-left">
            <div class="user-info-dropdown">
                <div class="dropdown">
                    <a class="dropdown-toggle no-arrow" role="">
                        <span class="user-name-header">PT.Sinar Kaliman Sehat</span>
                    </a>
                </div>
            </div>


        </div>
        <div class="header-right">
            <div class="container">
            </div>
            <div class="dashboard-setting user-notification">
                <div class="dropdown">
                    <a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
                        <i class="dw dw-settings2"></i>
                    </a>
                </div>
            </div>
            <div class="user-info-dropdown">
                <div class="dropdown">
                    <a class="dropdown-toggle no-arrow" role="" data-toggle="dropdown">
                        <span class="user-icon">
                            <i class="icon-copy fa fa-user-circle-o" aria-hidden="true"></i>
                        </span>
                        <span class="user-name">Admin</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="right-sidebar">
        <div class="sidebar-title">
            <h3 class="weight-600 font-16 text-blue">
                Layout Settings
                <span class="btn-block font-weight-400 font-12">User Interface Settings</span>
            </h3>
            <div class="close-sidebar" data-toggle="right-sidebar-close">
                <i class="icon-copy ion-close-round"></i>
            </div>
        </div>
        <div class="right-sidebar-body customscroll">
            <div class="right-sidebar-body-content">
                <h4 class="weight-600 font-18 pb-10">Header Background</h4>
                <div class="sidebar-btn-group pb-30 mb-10">
                    <a href="javascript:void(0);" class="btn btn-outline-primary header-white active">White</a>
                    <a href="javascript:void(0);" class="btn btn-outline-primary header-dark">Dark</a>
                </div>

                <h4 class="weight-600 font-18 pb-10">Sidebar Background</h4>
                <div class="sidebar-btn-group pb-30 mb-10">
                    <a href="javascript:void(0);" class="btn btn-outline-primary sidebar-light ">White</a>
                    <a href="javascript:void(0);" class="btn btn-outline-primary sidebar-dark active">Dark</a>
                </div>

                <h4 class="weight-600 font-18 pb-10">Menu Dropdown Icon</h4>
                <div class="sidebar-radio-group pb-10 mb-10">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebaricon-1" name="menu-dropdown-icon" class="custom-control-input"
                            value="icon-style-1" checked="">
                        <label class="custom-control-label" for="sidebaricon-1"><i class="fa fa-angle-down"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebaricon-2" name="menu-dropdown-icon"
                            class="custom-control-input" value="icon-style-2">
                        <label class="custom-control-label" for="sidebaricon-2"><i
                                class="ion-plus-round"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebaricon-3" name="menu-dropdown-icon"
                            class="custom-control-input" value="icon-style-3">
                        <label class="custom-control-label" for="sidebaricon-3"><i
                                class="fa fa-angle-double-right"></i></label>
                    </div>
                </div>

                <h4 class="weight-600 font-18 pb-10">Menu List Icon</h4>
                <div class="sidebar-radio-group pb-30 mb-10">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-1" name="menu-list-icon"
                            class="custom-control-input" value="icon-list-style-1" checked="">
                        <label class="custom-control-label" for="sidebariconlist-1"><i
                                class="ion-minus-round"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-2" name="menu-list-icon"
                            class="custom-control-input" value="icon-list-style-2">
                        <label class="custom-control-label" for="sidebariconlist-2"><i class="fa fa-circle-o"
                                aria-hidden="true"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-3" name="menu-list-icon"
                            class="custom-control-input" value="icon-list-style-3">
                        <label class="custom-control-label" for="sidebariconlist-3"><i
                                class="dw dw-check"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-4" name="menu-list-icon"
                            class="custom-control-input" value="icon-list-style-4" checked="">
                        <label class="custom-control-label" for="sidebariconlist-4"><i
                                class="icon-copy dw dw-next-2"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-5" name="menu-list-icon"
                            class="custom-control-input" value="icon-list-style-5">
                        <label class="custom-control-label" for="sidebariconlist-5"><i
                                class="dw dw-fast-forward-1"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-6" name="menu-list-icon"
                            class="custom-control-input" value="icon-list-style-6">
                        <label class="custom-control-label" for="sidebariconlist-6"><i
                                class="dw dw-next"></i></label>
                    </div>
                </div>

                <div class="reset-options pt-30 text-center">
                    <button class="btn btn-danger" id="reset-settings">Reset Settings</button>
                </div>
            </div>
        </div>
    </div>

    <div class="left-side-bar">
        <div class="brand-logo">
            <a href="#">
                <img src="{{ asset('tmplt/vendors/images/accounting.svg') }}" alt="" class="dark-logo">
                <img src="{{ asset('tmplt/vendors/images/accounting-white.svg') }}" alt=""
                    class="light-logo">
            </a>
            <div class="close-sidebar" data-toggle="left-sidebar-close">
                <i class="ion-close-round"></i>
            </div>
        </div>
        <div class="menu-block customscroll">
            <div class="sidebar-menu">
                <ul id="accordion-menu">
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle" data-option="on">
                            <span class="micon dw dw-list3"></span><span class="mtext">Data Akun Transaksi</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="{{ route('admin.AkunTransaksi') }}">Kelola Akun Transaksi</a></li>
                            <li><a href="{{ route('admin.ValidasiTransaksi') }}">Menu Validasi</a>
                            </li>
                        </ul>

                    </li>
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle" data-option="on">
                            <span class="micon dw dw-list3"></span><span class="mtext">Jurnal Umum</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="{{ route('admin.JurnalUmum') }}">Kelola Jurnal Umum</a></li>
                            <li><a href="{{ route('admin.ValidasiJurnalUmum') }}">Menu Validasi</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-list3"></span><span class="mtext">Jurnal Penyesuaian</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="{{ route('admin.JurnalPenyesuaian') }}">Kelola Jurnal Penyesuaian</a></li>
                            <li><a href="{{ route('admin.ValidasiJurnalPenyesuaian') }}">Menu Validasi</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('admin.BukuBesar') }}" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-list3"></span><span class="mtext">Buku Besar</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.NeracaLajur') }}" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-list3"></span><span class="mtext">Neraca Lajur</span>
                        </a>
                    </li>
                    <li class="dropdown show">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-list3"></span><span class="mtext">Laporan</span>
                        </a>
                        <ul class="submenu" style="display: block;">
                            <li><a href="{{ route('admin.Ekuitas') }}" class="active">Perubahan Ekuitas</a></li>
                            <li><a href="{{ route('admin.LabaRugi') }}">Laba Rugi</a></li>
                            <li><a href="{{ route('admin.PosisiKeuangan') }}">Posisi Keuangan</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('admin.JurnalPenutup') }}" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-list3"></span><span class="mtext">Jurnal Penutup</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.RencanaAnggaranBiaya') }}" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-list3"></span><span class="mtext">Rencana Anggaran Biaya</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.AkunPengguna') }}" class="dropdown-toggle no-arrow">
                            <span class="micon fa fa-user-o"></span><span class="mtext">Akun Pengguna</span>

                        </a>
                    </li>
                    <li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                            style="display: none;">
                            @csrf
                        </form>
                        <a href="#" class="dropdown-toggle no-arrow"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <span class="micon dw dw-right-arrow1"></span><span class="mtext">Logout</span>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
    <div class="mobile-menu-overlay"></div>

    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="pd-20 card-box mb-30">
                    <div class="clearfix">
                        <div class="pull-left">
                            <h4 class="text-black h4">Laporan Perubahan Ekuitas</h4>
                            <p class="mb-30">Kelola Laporan Perubahan Ekuitas</p>
                        </div>
                    </div>
                    <form>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Kriteria</label>
                            <div class="col-sm-12 col-md-10">
                                <select class="custom-select col-12" id="kriteriaSelect" name="kriteria" required>
                                    <option value="" selected>Pilih...</option>
                                    <option value="periode" {{ request('kriteria') == 'periode' ? 'selected' : '' }}>
                                        Periode</option>
                                    <option value="tanggal" {{ request('kriteria') == 'tanggal' ? 'selected' : '' }}>
                                        Tanggal</option>
                                </select>
                            </div>
                        </div>

                         <div class="form-group row" id="periodeOptions" style="display:none;">
                            <label class="col-sm-12 col-md-2 col-form-label">Periode</label>
                            <div class="col-sm-12 col-md-10">
                                <select class="custom-select col-12" name="periode">
                                    <option value="" selected>Pilih...</option>
                                    <option value="1" {{ request('periode') == '1' ? 'selected' : '' }}>1 Tahun
                                        Terakhir</option>
                                    <option value="2" {{ request('periode') == '2' ? 'selected' : '' }}>1 Bulan
                                        Terakhir</option>
                                    <option value="3" {{ request('periode') == '3' ? 'selected' : '' }}>1 Minggu
                                        Terakhir</option>
                                </select>
                            </div>
                        </div>

                        <!-- Tanggal options (hidden by default) -->
                        <div class="form-group row" id="tanggalOptions" style="display:none;">
                            <label class="col-sm-12 col-md-2 col-form-label">Tanggal Awal</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="date" id="tanggalAwal" name="tanggal_awal"
                                    value="{{ request('tanggal_awal') }}" onchange="validateTanggal()">
                            </div>
                        </div>

                        <div class="form-group row" id="tanggalAkhirOptions" style="display:none;">
                            <label class="col-sm-12 col-md-2 col-form-label">Tanggal Akhir</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="date" id="tanggalAkhir" name="tanggal_akhir"
                                    value="{{ request('tanggal_akhir') }}" onchange="validateTanggal()">
                            </div>
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="submit" class="btn btn-outline-info"style="width: 10%">Cari</button>
                        </div>
                    </form>
                </div>
            </div>
            @if (request()->has('kriteria'))
                <div class="card-box mb-30">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button onclick="window.location.href='{{ route('admin.downloadEkuitas') }}'"
                            class="btn btn-danger"
                            style="width: 8%; margin-top:10px;margin-bottom:10px; margin-right: 20px;">Report</button>
                    </div>
                    <div class="pd-10">
                    </div>
                    <div class="pb-10 pd-2">
                        @php
                            $totalPendapatan = 0;
                            $bebanPendapatan = 0;
                            $total = 0;
                            $totalModal = 0;
                            $totalPrive = 0;
                        @endphp
                        {{--  Perhitungan Untuk Laba Bersih --}}
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
                        <table class="table table-bordered">
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
                                        <tr>
                                            <td>{{ $akun->nama }}</td>
                                            <td class="text-right modal_neraca_saldo_debit">Rp.
                                                {{ number_format($nilai, 0, ',', '.') }}</td>
                                            <td class="text-right modal_neraca_saldo_kredit">-</td>
                                            <td></td>
                                        </tr>
                                    @elseif($akun->post_saldo == 1)
                                        <tr>
                                            <td>{{ $akun->nama }}</td>
                                            <td class="text-right modal_neraca_saldo_debit">-</td>
                                            <td class="text-right modal_neraca_saldo_kredit">Rp.
                                                {{ number_format($nilai, 0, ',', '.') }}</td>
                                            <td></td>
                                        </tr>
                                    @endif
                                @endforeach
                                <tr>
                                    <td>Laba Bersih</td>
                                    <td class="text-right modal_neraca_saldo_debit">Rp.
                                        {{ number_format($total, 0, ',', '.') }}</td>
                                    <td class="text-right modal_neraca_saldo_kredit">-</td>
                                    <td></td>
                                </tr>
                                @php
                                    $totalDebit = $totalModal + $total;
                                    $totalKredit = $totalPrive;
                                    $totalSemua = $totalDebit - $totalKredit;
                                @endphp
                                <tr>
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
                                <tr>
                                    <th colspan="3" class="text-right">Total Modal</th>
                                    <th class="text-right" id="total_modal">
                                        {{ number_format($totalSemua, 0, ',', '.') }}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            @endif
        </div>

    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const kriteriaSelect = document.getElementById('kriteriaSelect');
            const periodeOptions = document.getElementById('periodeOptions');
            const tanggalOptions = document.getElementById('tanggalOptions');
            const tanggalAkhirOptions = document.getElementById('tanggalAkhirOptions');

            function toggleFields() {
                const kriteria = kriteriaSelect.value;
                periodeOptions.style.display = kriteria === 'periode' ? 'block' : 'none';
                tanggalOptions.style.display = tanggalAkhirOptions.style.display = kriteria === 'tanggal' ?
                    'block' : 'none';
            }

            kriteriaSelect.addEventListener('change', toggleFields);
            toggleFields(); // Run once on page load
        });
        function validateTanggal() {
            // Ambil nilai dari input Tanggal Awal dan Tanggal Akhir
            const tanggalAwal = document.getElementById('tanggalAwal').value;
            const tanggalAkhir = document.getElementById('tanggalAkhir').value;

            // Periksa apakah kedua tanggal diisi
            if (tanggalAwal && tanggalAkhir) {
                // Konversi nilai ke format Date agar bisa dibandingkan
                const dateAwal = new Date(tanggalAwal);
                const dateAkhir = new Date(tanggalAkhir);

                // Periksa apakah Tanggal Awal lebih besar dari Tanggal Akhir
                if (dateAwal > dateAkhir) {
                    alert("Tanggal Awal harus melebihi atau sama dengan Tanggal Akhir.");

                    // Reset nilai Tanggal Awal
                    document.getElementById('tanggalAwal').value = '';
                }
            }
        }
        document.getElementById('kriteriaSelect').addEventListener('change', function() {
            var selectedKriteria = this.value;

            // Hide both options first
            document.getElementById('periodeOptions').style.display = 'none';
            document.getElementById('tanggalOptions').style.display = 'none';
            document.getElementById('tanggalAkhirOptions').style.display = 'none';

            // Show the appropriate options based on selection
            if (selectedKriteria === 'periode') {
                document.getElementById('periodeOptions').style.display = 'flex';
            } else if (selectedKriteria === 'tanggal') {
                document.getElementById('tanggalOptions').style.display = 'flex';
                document.getElementById('tanggalAkhirOptions').style.display = 'flex';
            }
        });
    </script>

    <!-- js -->
    <script src="{{ asset('tmplt/vendors/scripts/core.js') }}"></script>
    <script src="{{ asset('tmplt/vendors/scripts/script.min.js') }}"></script>
    <script src="{{ asset('tmplt/vendors/scripts/process.js') }}"></script>
    <script src="{{ asset('tmplt/vendors/scripts/layout-settings.js') }}"></script>
    <script src="{{ asset('tmplt/src/plugins/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('tmplt/src/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('tmplt/src/plugins/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('tmplt/src/plugins/datatables/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('tmplt/src/plugins/datatables/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('tmplt/vendors/scripts/dashboard.js') }}"></script>
    <!-- buttons for Export datatable -->
    <script src="{{ asset('tmplt/src/plugins/datatables/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('tmplt/src/plugins/datatables/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('tmplt/src/plugins/datatables/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('tmplt/src/plugins/datatables/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('tmplt/src/plugins/datatables/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('tmplt/src/plugins/datatables/js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('tmplt/src/plugins/datatables/js/vfs_fonts.js') }}"></script>
</body>

</html>
