<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>Sistem Informasi Akutansi - PT Sinar Kaliman Sehat</title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('tmplt/vendors/images/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('tmplt/vendors/images/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('tmplt/vendors/images/favicon-16x16.png') }}">

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
            margin-top: 20px;
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
                <div class="search-container">
                    <label>
                        <input type="search" class="form-control form-control-sm" placeholder="Search">
                    </label>
                </div>
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
                        <label class="custom-control-label" for="sidebaricon-1"><i
                                class="fa fa-angle-down"></i></label>
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
                            <li><a href="{{ route('admin.Ekuitas') }}">Perubahan Ekuitas</a></li>
                            <li><a href="{{ route('admin.LabaRugi') }}">Laba Rugi</a></li>
                            <li><a href="{{ route('admin.PosisiKeuangan') }}" class="active">Posisi Keuangan</a></li>
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
                        <a href="{{ route('logout') }}" class="dropdown-toggle no-arrow">
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
                            <h4 class="text-black h4">Laporan Posisi Keuangan</h4>
                            <p class="mb-30">Kelola Laporan Posisi Keuangan</p>
                        </div>
                        {{-- <div class="pull-right">
                            <a href="#basic-form1" class="btn btn-primary btn-sm scroll-click" rel="content-y"
                                data-toggle="collapse" role="button"><i class="fa fa-code"></i> Source Code</a>
                        </div> --}}
                    </div>
                    <form>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Select</label>
                            <div class="col-sm-12 col-md-10">
                                <select class="custom-select col-12">
                                    <option selected="">Choose...</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>

                        </div>
                        {{-- <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Text</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" placeholder="Johnny Brown">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Search</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" placeholder="Search Here" type="search">
                            </div>
                        </div> --}}
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Select</label>
                            <div class="col-sm-12 col-md-10">
                                <select class="custom-select col-12">
                                    <option selected="">Choose...</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>

                        </div>
                    </form>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="button" class="btn btn-outline-info">Dark</button>
                    </div>
                </div>
            </div>
            <div class="card-box mb-30">
                <div class="pd-10">
                </div>
                <div class="pb-10 pd-2">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="bg-primary text-white">
                                        <tr>
                                            <th colspan="5" class="text-center">Aktiva</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th colspan="5">Aktiva Lancar</th>

                                        </tr>

                                        <tr>

                                            <td colspan="2">A</td>
                                            <td class="text-right aktiva_lancar_neraca_saldo_debit">
                                                RP.0
                                            </td>
                                            <td class="text-right aktiva_lancar_neraca_saldo_kredit">
                                                -
                                            </td>
                                            <td></td>
                                        </tr>

                                        <tr>
                                            <th colspan="2" class="text-right">Total Aktiva Lancar</th>
                                            <th class="text-right" id="jumlah_aktiva_lancar_debit">Rp.0</th>
                                            <th class="text-right" id="jumlah_aktiva_lancar_kredit">-</th>
                                            <th class="text-right" id="jumlah_aktiva_lancar">Rp.0</th>
                                        </tr>
                                        <tr>
                                            <th colspan="5">Aktiva Tetap</th>

                                        </tr>

                                        <tr>
                                            <td colspan="2">B</td>
                                            <td class="text-right aktiva_tetap_neraca_saldo_debit">
                                                RP.0
                                            </td>
                                            <td class="text-right aktiva_tetap_neraca_saldo_kredit">
                                                -
                                            </td>
                                            <td></td>
                                        </tr>

                                        <tr>
                                            <th colspan="2" class="text-right">Total Aktiva Tetap</th>
                                            <th class="text-right" id="jumlah_aktiva_tetap_debit">RP.0</th>
                                            <th class="text-right" id="jumlah_aktiva_tetap_kredit">-</th>
                                            <th class="text-right" id="jumlah_aktiva_tetap">RP.0</th>
                                        </tr>
                                    </tbody>
                                    <tfoot class="bg-primary text-white">
                                        <tr>
                                            <th colspan="4" class="text-right">Total Aktiva</th>
                                            <th class="text-right" id="total_aktiva">Rp.0</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="bg-primary text-white">
                                        <tr>
                                            <th colspan="5" class="text-center">Kewajiban Dan Modal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th colspan="5">Utang Lancar</th>
                                        </tr>
                                        <tr>
                                            <td colspan="2">A</td>
                                            <td class="text-right utang_lancar_neraca_saldo_debit">Rp.0</td>
                                            <td class="text-right utang_lancar_neraca_saldo_kredit">-</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th colspan="2" class="text-right">Total Utang Lancar</th>
                                            <th class="text-right" id="jumlah_utang_lancar_debit">Rp.0</th>
                                            <th class="text-right" id="jumlah_utang_lancar_kredit">-</th>
                                            <th class="text-right" id="jumlah_utang_lancar">Rp.0</th>
                                        </tr>
                                        <tr>
                                            <th colspan="5">Utang Tetap</th>
                                        </tr>
                                        <tr>
                                            <td colspan="2">B</td>
                                            <td class="text-right utang_tetap_neraca_saldo_debit">Rp.0</td>
                                            <td class="text-right utang_tetap_neraca_saldo_kredit">-</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th colspan="2" class="text-right">Total Utang Tetap</th>
                                            <th class="text-right" id="jumlah_utang_tetap_debit">Rp.0</th>
                                            <th class="text-right" id="jumlah_utang_tetap_kredit">-</th>
                                            <th class="text-right" id="jumlah_utang_tetap">Rp.0</th>
                                        </tr>
                                        <tr>
                                            <th colspan="5">Modal</th>
                                        </tr>

                                        <tr>
                                            <td colspan="2">C</td>
                                            <td class="text-right modal_neraca_saldo_debit">Rp.0</td>
                                            <td class="text-right modal_neraca_saldo_kredit">-</td>
                                            <td></td>
                                        </tr>

                                        <tr>
                                            <td colspan="2">Laba Bersih</td>
                                            <td class="text-right modal_neraca_saldo_debit">Rp.0</td>
                                            <td class="text-right modal_neraca_saldo_kredit">-</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th colspan="2" class="text-right">Total Modal</th>
                                            <th class="text-right" id="jumlah_modal_debit">Rp.0</th>
                                            <th class="text-right" id="jumlah_modal_kredit">Rp/0</th>
                                            <th class="text-right" id="jumlah_modal">Rp.0</th>
                                        </tr>
                                    </tbody>
                                    <tfoot class="bg-primary text-white">
                                        <tr>
                                            <th colspan="4" class="text-right">Total Kewajiban Dan Modal</th>
                                            <th class="text-right" id="total_modal">Rp.0</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
    </div>



    </div>
    </div>
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
