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
                        <a href="{{ route('admin.BukuBesar') }}" class="dropdown-toggle no-arrow active">
                            <span class="micon dw dw-list3"></span><span class="mtext">Buku Besar</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.NeracaLajur') }}" class="dropdown-toggle no-arrow ">
                            <span class="micon dw dw-list3"></span><span class="mtext">Neraca Lajur</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-list3"></span><span class="mtext">Laporan</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="{{ route('admin.Ekuitas') }}">Perubahan Ekuitas</a></li>
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
                            <h4 class="text-black h4">Buku Besar</h4>
                            <p class="mb-30">Kelola Buku Besar</p>
                        </div>
                        {{-- <div class="pull-right">
                            <a href="#basic-form1" class="btn btn-primary btn-sm scroll-click" rel="content-y"
                                data-toggle="collapse" role="button"><i class="fa fa-code"></i> Source Code</a>
                        </div> --}}
                    </div>
                    <form id="searchForm" method="GET" action="{{ route('admin.BukuBesar') }}">
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Akun</label>
                            <div class="col-sm-12 col-md-10">
                                <select class="custom-select col-12" name="akun" id="akun" required>
                                    <option value="" selected>Pilih...</option>
                                    @foreach (App\Models\AkunTransaksi::where('status', 'approved')->orderBy('kode')->get() as $item)
                                        <option value="{{ $item->id }}"
                                            {{ request('akun') == $item->id ? 'selected' : '' }}>
                                            {{ $item->kode }} - {{ $item->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

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
                                <select class="custom-select col-12" id="periode" name="periode">
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

                        <div class="form-group row" id="tanggalOptions" style="display:none;">
                            <label class="col-sm-12 col-md-2 col-form-label">Tanggal Awal</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="date" id="tanggalAwal" name="tanggal_awal"
                                    value="{{ request('tanggal_awal') }}">
                            </div>
                        </div>

                        <div class="form-group row" id="tanggalAkhirOptions" style="display:none;">
                            <label class="col-sm-12 col-md-2 col-form-label">Tanggal Akhir</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="date" id="tanggalAkhir" name="tanggal_akhir"
                                    value="{{ request('tanggal_akhir') }}">
                            </div>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="submit" class="btn btn-primary" style="width: 8%">Cari</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        @if ($results->isNotEmpty())
            @php
                $nilai = 0;
                $akunTransaksi = $akunTransaksiList->find($results->first()->akun_id);
            @endphp
            <div class="card shadow mt-4">
                <div class="card-header">
                    <div
                        class="card-header d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-md-between text-center text-md-left">
                        <span class="font-weight-900">Nama Akun : {{ $akunTransaksi->nama }}</span>
                        <span class="font-weight-900">Kode Akun : {{ $akunTransaksi->kode }}</span>
                    </div>

                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button onclick="window.location.href='{{ route('admin.downloadBukuBesar') }}'"
                        class="btn btn-danger"
                        style="width: 8%; margin-bottom:20px; margin-right: 20px;">Report</button>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
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
                                    <tr>
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
            </div>
        @else
            <div></div>
        @endif
        <!-- Periode options (hidden by default) -->
        <script>
            document.getElementById('searchForm').addEventListener('submit', function(e) {
                const akun = document.getElementById('akun').value;
                const kriteria = document.getElementById('kriteriaSelect').value;

                // Check if Akun or Kriteria is empty
                if (!akun) {
                    alert('Field "Akun" harus diisi.');
                    e.preventDefault();
                    return;
                }

                if (!kriteria) {
                    alert('Field "Kriteria" harus diisi.');
                    e.preventDefault();
                    return;
                }

                // If Kriteria is "periode", ensure periode is selected
                if (kriteria === 'periode') {
                    const periode = document.getElementById('periode').value;
                    if (!periode) {
                        alert('Field "Periode" harus diisi.');
                        e.preventDefault();
                        return;
                    }
                }

                // If Kriteria is "tanggal", ensure Tanggal Awal and Tanggal Akhir are selected
                if (kriteria === 'tanggal') {
                    const tanggalAwal = document.getElementById('tanggalAwal').value;
                    const tanggalAkhir = document.getElementById('tanggalAkhir').value;

                    if (!tanggalAwal) {
                        alert('Field "Tanggal Awal" harus diisi.');
                        e.preventDefault();
                        return;
                    }

                    if (!tanggalAkhir) {
                        alert('Field "Tanggal Akhir" harus diisi.');
                        e.preventDefault();
                        return;
                    }

                    // Validate that Tanggal Awal is not after Tanggal Akhir
                    const dateAwal = new Date(tanggalAwal);
                    const dateAkhir = new Date(tanggalAkhir);
                    if (dateAwal > dateAkhir) {
                        alert('Tanggal Awal tidak boleh lebih besar dari Tanggal Akhir.');
                        e.preventDefault();
                        return;
                    }
                }
            });

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
        <!-- Datatable Setting js -->
        <script src="vendors/scripts/datatable-setting.js"></script>
</body>

</html>
