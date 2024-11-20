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
        /* Styling for the popup */
        .popup {
            display: none;
            /* Initially hidden */
            position: fixed;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            width: 30%;
            height: 50%;
            max-width: 600px;
            /* Lebar maksimum */
            max-height: 50%;
            /* Tinggi maksimum */
            overflow-y: auto;
            /* Tambahkan scrollbar jika konten terlalu tinggi */
            padding: 40px;
            z-index: 1000;


        }

        .close {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 24px;
            cursor: pointer;
        }

        /* Overlay styling */
        #overlay {
            display: none;
            /* Initially hidden */
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }

        .form-group {
            margin-top: 20px;
        }

        @media (max-width: 768px) {
            #popup {
                width: 80%;
                height: auto;
                padding: 20px;
            }
        }

        @media (max-width: 480px) {
            #popup {
                width: 90%;
                height: auto;
                padding: 15px;
            }
        }
    </style>
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
                            <li><a href="{{ route('admin.ValidasiTransaksi') }}">Menu Validasi</a></li>
                        </ul>

                    </li>
                    <li class="dropdown show">
                        <a href="javascript:;" class="dropdown-toggle" data-option="on">
                            <span class="micon dw dw-list3"></span><span class="mtext">Jurnal Umum</span>
                        </a>
                        <ul class="submenu" style="display: block;">
                            <li><a href="{{ route('admin.JurnalUmum') }}" class="active">Kelola Jurnal Umum</a></li>
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
                <div class="page-header">
                    <div class="row">
                        <div class="col">
                            <div class="title">
                                <div
                                    class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-md-between text-center text-md-left">
                                    <div class="mb-3">
                                        <a class="dropdown-toggle no-arrow" role="">
                                            <span class="user-name-header">Jurnal Umum</span>
                                        </a>
                                        <p class="mb-0 text-sm">Kelola Jurnal Umum</p>
                                    </div>
                                    <div class="mb-3">
                                        <a onclick="openPopup('popup2')" class="btn btn-primary" title="Waktu"><i
                                                class="icon-copy ion-ios-calendar-outline"
                                                style="font-size: 30px; color:white"></i></a>
                                        <a class="btn btn-success show-modal"
                                            onclick="openPopup('popup1')"title="Tambah"><i
                                                class="icon-copy ion-plus-round"
                                                style="font-size: 30px; color:white"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-box mb-30">
                    <div class="pd-10">
                    </div>
                    <div class="pb-10 pd-2">
                        @if ($data->isEmpty())
                        @else
                            <table class="data-table table ">
                                <thead>
                                    <tr>
                                        {{-- <th class="table-plus datatable-nosort">Name</th> --}}
                                        <th class="table-plus sort_disabled">Tanggal</th>
                                        <th class="table-plus datatable-nosort">Keterangan</th>
                                        <th class="table-plus datatable-nosort">Akun</th>
                                        <th class="table-plus datatable-nosort">Debit</th>
                                        <th class="table-plus datatable-nosort">Kredit</th>
                                        <th class="table-plus datatable-nosort">Status</th>
                                        <th class="datatable-nosort">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $d)
                                        <tr>
                                            <td>{{ $d->tanggal }}</td>
                                            <td>{{ $d->keterangan }}</td>
                                            <td>{{ $d->akuntransaksi ? $d->akuntransaksi->nama : 'Tidak Ditemukan' }}
                                            </td>
                                            <td>{{ $d->debit_atau_kredit == 1 ? 'Rp. ' . substr(number_format($d->nilai, 2, ',', '.'), 0, -3) : '-' }}
                                            </td>
                                            <td>{{ $d->debit_atau_kredit == 2 ? 'Rp. ' . substr(number_format($d->nilai, 2, ',', '.'), 0, -3) : '-' }}
                                            </td>
                                            <td>{{ $d->status }}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                                        href="#" role="button" data-toggle="dropdown">
                                                        <i class="dw dw-more"></i>
                                                    </a>
                                                    <div
                                                        class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                        <a class="dropdown-item" href="#"
                                                            onclick="showImagePopup('{{ asset('storage/bukti/' . $d->bukti) }}')"><i
                                                                class="dw dw-eye"></i>
                                                            Gambar</a>
                                                        <a class="dropdown-item"
                                                            onclick="openPopup('popup3', '{{ $d->id }}','{{ $d->akun_id }}','{{ $d->tanggal }}', '{{ $d->keterangan }}','{{ $d->bukti }}','{{ $d->debit_atau_kredit }}', '{{ $d->nilai }}')"><i
                                                                class="dw dw-edit2"></i>
                                                            Edit</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Pop Up Penambahan Data --}}
    <div id="overlay" onclick="closePopup('popup1')"></div>
    <div id="popup1" class="popup" style="width: 50%;">
        <span class="close" onclick="closePopup('popup1')">&times;</span>
        <form id="addForm" class="model-popup" action="{{ route('admin.JurnalUmumstore') }}" method="POST"
            onsubmit="return validateForm()" enctype="multipart/form-data">
            @csrf
            <h4 class="modal-title">Tambah Jurnal Umum</h4>
            <div class="form-group row">
                <label class=" col-sm-12 col-md-2 col-form-label" for="akun_id">Akun</label>
                <div class="col-sm-12 col-md-10">
                    <select class="custom-select col-12" name="akun_id" id="akun_id">
                        @foreach (App\Models\AkunTransaksi::where('status', 'approved')->orderBy('kode')->get() as $item)
                            <option value="{{ $item->id }}" {{ old('akun_id') == $item->id ? 'selected' : '' }}>
                                {{ $item->kode }} - {{ $item->nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class=" col-sm-12 col-md-2 col-form-label" for="tanggal">Tanggal</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control " type="date" name="tanggal" id="tanggal" name="Tanggal"
                        value="{{ old('tanggal') }}">
                </div>
            </div>
            <div class="form-group row">
                <label class=" col-sm-12 col-md-2 col-form-label" for="keterangan">Keterangan</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" placeholder="Masukan Keterangan" name="keterangan" id="keterangan"
                        value="{{ old('keterangan') }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="formFile" class="col-sm-12 col-md-2 col-form-label" for="bukti">Bukti</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="file" name="bukti" id="bukti"
                        value="{{ old('bukti') }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label" for="debit_atau_kredit">Debit/Kredit</label>
                <div class="col-sm-12 col-md-10">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="debit_atau_kredit"
                            id="debit_atau_kredit1" value="1"
                            {{ old('debit_atau_kredit') == 1 ? 'checked' : '' }}>
                        <label class="form-check-label" for="debit_atau_kredit1">
                            Debit
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio"name="debit_atau_kredit"
                            id="debit_atau_kredit2" value="2"
                            {{ old('debit_atau_kredit') == 2 ? 'checked' : '' }}>
                        <label class="form-check-label" for="debit_atau_kredit2">
                            Kredit
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label"for="nilai">Nilai</label>
                <div class="col-sm-12 col-md-10">
                    <input type="number" class="form-control" name="nilai" id="nilai"
                        placeholder="Masukan Nilai" value="{{ old('nilai') }}" min="0"
                        oninput="this.value = this.value < 0 ? '' : this.value;">
                </div>
                <input type="hidden" name="status" value="approved">
            </div>
            <button type="submit" style="width:100px;" class="btn btn-success">Tambah</button>
        </form>
    </div>

    {{-- Pop Up Penampilan Data Berdasarkan Tanggal --}}
    <div id="overlay" onclick="closePopup('popup2')"></div>
    <div id="popup2" class="popup" style="width: 50%;">

        <span class="close" onclick="closePopup('popup2')">&times;</span>
        <form class="model-popup" action="{{ route('admin.JurnalUmumFilter') }}" method="GET">
            <h4 class="modal-title">Waktu</h4>

            <div class="form-group row">
                <label class=" col-sm-12 col-md-2 col-form-label">Tanggal Awal</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" id="tanggalAwal" type="date" name="awal"
                        value="{{ request('awal') }}" onchange="validateTanggal()">
                </div>
            </div>
            <div class="form-group row">
                <label class=" col-sm-12 col-md-2 col-form-label">Tanggal Akhir</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" id="tanggalAkhir" type="date" name="akhir"
                        value="{{ request('akhir') }}" onchange="validateTanggal()">
                </div>
            </div>
            <button type='submit' style="width:100px;" class="btn btn-primary">Cari</button>

        </form>
    </div>

    {{-- Pop Up Pengeditan Data --}}
    <div id="overlay" onclick="closePopup('popup3')"></div>
    <div id="popup3" class="popup" style="width: 50%;">
        <span class="close" onclick="closePopup('popup3')">&times;</span>
        <form id="editForm" class="model-popup" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <h4 class="modal-title">Edit Jurnal Umum</h4>
            <input type="hidden" id="editUserId" name="id">
            <div class="form-group row">
                <label class=" col-sm-12 col-md-2 col-form-label" for="akun_id">Akun</label>
                <div class="col-sm-12 col-md-10">
                    <select class="custom-select col-12" name="akun_id" id="editAkun_id">
                        @foreach (App\Models\AkunTransaksi::orderBy('kode')->get() as $item)
                            <option value="{{ $item->id }}">
                                {{ $item->kode }} - {{ $item->nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class=" col-sm-12 col-md-2 col-form-label" for="tanggal">Tanggal</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control " type="date" name="tanggal" id="editTanggal">
                </div>
            </div>
            <div class="form-group row">
                <label class=" col-sm-12 col-md-2 col-form-label" for="keterangan">Keterangan</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" placeholder="Masukan Keterangan" name="keterangan"
                        id="editKeterangan">
                </div>
            </div>
            <div class="form-group row">
                <label for="formFile" class="col-sm-12 col-md-2 col-form-label" for="bukti">Bukti</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="file" name="bukti" id="editBukti">
                    <div id="existingImageContainer" style="margin-top: 10px;"></div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label" for="debit_atau_kredit">Debit/Kredit</label>
                <div class="col-sm-12 col-md-10">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="debit_atau_kredit"
                            id="debit_atau_kredit1" value="1">
                        <label class="form-check-label" for="debit_atau_kredit1">
                            Debit
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="debit_atau_kredit"
                            id="debit_atau_kredit2" value="2">
                        <label class="form-check-label" for="debit_atau_kredit2">
                            Kredit
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class=" col-sm-12 col-md-2 col-form-label" for="nilai">Nilai</label>
                <div class="col-sm-12 col-md-10">
                    <input type="number" class="form-control" placeholder="Masukan Nilai" name="nilai"
                        id="editNilai" min="0" oninput="this.value = this.value < 0 ? '' : this.value;">
                </div>
            </div>
            <button type="submit" style="width:100px;" class="btn btn-primary">Edit</button>
        </form>
    </div>

    {{-- Pop Up Penampilan Bukti Data Gambar --}}
    <div id="imagePopup" class="popup" style="display: none;">
        <span class="close" onclick="closeImagePopup()">&times;</span>
        <img id="popupImage" src="" alt="Image" style="max-width: 100%; height: auto;">
    </div>
    <div id="overlay" style="display: none;" onclick="closeImagePopup()"></div>


    <script>
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

        function showImagePopup(imageUrl) {
            const overlay = document.createElement('div');
            overlay.style.position = 'fixed';
            overlay.style.top = '0';
            overlay.style.left = '0';
            overlay.style.width = '100%';
            overlay.style.height = '100%';
            overlay.style.backgroundColor = 'rgba(0, 0, 0, 0.5)';
            overlay.style.zIndex = '999';
            overlay.style.cursor = 'pointer';

            // Create a popup element
            const popup = document.createElement('div');
            popup.style.position = 'fixed';
            popup.style.top = '50%';
            popup.style.left = '60%';
            popup.style.transform = 'translate(-50%, -50%)';
            popup.style.backgroundColor = '#fff';
            popup.style.padding = '10px';
            popup.style.zIndex = '1000';
            popup.style.boxShadow = '0px 0px 10px rgba(0, 0, 0, 0.5)';
            popup.style.maxWidth = '55%';
            popup.style.maxHeight = '100%';
            popup.style.overflow = 'auto'; // Allow scrolling for overflow content

            // Create an image element
            const img = document.createElement('img');
            img.src = imageUrl;
            img.style.maxWidth = '100%';
            img.style.height = 'auto';

            // Create a close button
            const closeBtn = document.createElement('button');
            closeBtn.innerText = '✖'; // Use an "X" icon
            closeBtn.style.position = 'absolute';
            closeBtn.style.top = '10px';
            closeBtn.style.right = '10px';
            closeBtn.style.border = 'none';
            closeBtn.style.backgroundColor = 'transparent';
            closeBtn.style.color = '#f00';
            closeBtn.style.cursor = 'pointer';
            closeBtn.style.fontSize = '18px';
            closeBtn.style.padding = '5px';
            closeBtn.style.borderRadius = '50%';
            closeBtn.style.width = '30px';
            closeBtn.style.height = '30px';
            closeBtn.style.display = 'flex';
            closeBtn.style.alignItems = 'center';
            closeBtn.style.justifyContent = 'center';

            // Set the close button's click event to remove the overlay and popup
            closeBtn.onclick = function() {
                document.body.removeChild(overlay);
                document.body.removeChild(popup);
            };

            // Append elements to the popup
            popup.appendChild(img);
            popup.appendChild(closeBtn);

            // Append the popup and overlay to the body
            document.body.appendChild(overlay);
            document.body.appendChild(popup);

            // Close the popup when clicking on the overlay
            overlay.onclick = function() {
                document.body.removeChild(overlay);
                document.body.removeChild(popup);
            };
        }

        function closeImagePopup() {
            document.getElementById('imagePopup').style.display = 'none';
            document.getElementById('overlay').style.display = 'none';
        }

        document.getElementById('nilai').addEventListener('input', function() {
            if (this.value < 0) {
                this.value = '';
            }
        });
        document.getElementById('editNilai').addEventListener('input', function() {
            if (this.value < 0) {
                this.value = '';
            }
        });



        function openPopup(popupId, userId, userAkun_id, userTanggal, userKeterangan, userBukti, DebitKredit, userNilai) {
            $('#editForm')[0].reset();
            $('#addForm')[0].reset();

            document.getElementById(popupId).style.display = 'block';
            document.getElementById("overlay").style.display = "block";

            $('#editUserId').val(userId);
            $('#editAkun_id').val(userAkun_id).change(); // Make sure to trigger change event
            $('#editTanggal').val(userTanggal);
            $('#editKeterangan').val(userKeterangan);
            $('#editNilai').val(userNilai);

            // Set radio buttons
            $('input[name="debit_atau_kredit"][value="' + DebitKredit + '"]').prop('checked', true);

            // Handle existing image
            const existingImageContainer = document.getElementById('existingImageContainer');
            existingImageContainer.innerHTML = ''; // Clear previous image if any

            if (userBukti) {
                const imgElement = document.createElement('img');
                imgElement.src = '/storage/bukti/' + userBukti; // Adjust path if necessary
                imgElement.style.maxWidth = '100%';
                imgElement.style.height = 'auto';
                imgElement.style.marginTop = '10px'; // Adjust margin if needed

                existingImageContainer.appendChild(imgElement);
            }
            $('#editForm').on('submit', function(e) {
                // Ambil nilai input dari form
                const userId = $('#editUserId').val();
                const akunId = $('#editAkun_id').val();
                const tanggal = $('#editTanggal').val();
                const keterangan = $('#editKeterangan').val();
                const nilai = $('#editNilai').val();

                // Cek jika salah satu nilai kosong
                if (!userId || !akunId || !tanggal || !keterangan || !nilai) {
                    e.preventDefault(); // Cegah pengiriman form
                    alert('Semua data harus diisi. Tidak boleh ada kolom kosong.');
                    return;
                }

                // Jika semua input valid, form akan dikirim
            });

            // Set form action
            $('#editForm').attr('action', "{{ url('admin/JurnalUmum/update') }}/" + userId);
        }



        function closePopup(popupId) {
            document.getElementById(popupId).style.display = 'none';
            document.getElementById("overlay").style.display = "none";
            $('#editForm')[0].reset();
            $('#addForm')[0].reset();
        }
    </script>
    <script>
        function validateForm() {
            console.log("validateForm called"); // Debugging

            var akun_id = document.getElementById('akun_id').value;
            var tanggal = document.getElementById('tanggal').value;
            var keterangan = document.getElementById('keterangan').value;
            var bukti = document.getElementById('bukti').value;
            var debit_atau_kredit = document.querySelector('input[name="debit_atau_kredit"]:checked');

            if (akun_id === "" || tanggal === "" || keterangan === "" || bukti === "" || !debit_atau_kredit) {
                alert("Semua field harus diisi.");
                return false; // Prevent form submission
            }

            return true; // Allow form submission
        }
    </script>

    <!-- js -->
    <script src="{{ asset('tmplt/vendors/scripts/core.js') }}"></script>
    <script src="{{ asset('tmplt/vendors/scripts/script.min.js') }}"></script>
    <script src="{{ asset('tmplt/vendors/scripts/process.js') }}"></script>
    <script src="{{ asset('tmplt/vendors/scripts/layout-settings.js') }}"></script>
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
</body>

</html>
