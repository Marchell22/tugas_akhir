<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

    <!-- Global site tag (gtag.js) - Google Analytics -->
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
            font-size: 25px;
            /* Ganti dengan ukuran yang diinginkan */
            font-weight: bold;
            /* Membuat teks menjadi bold, jika diperlukan */
        }
    </style>
</head>
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
        margin-bottom: 15px;
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
            <div class="dashboard-setting user-notification">
                <div class="dropdown">
                    <a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
                        <i class="dw dw-settings2"></i>
                    </a>
                </div>
            </div>
            <div class="user-info-dropdown">
                <div class="dropdown">
                    <a class="dropdown-toggle no-arrow" href="#" role="" data-toggle="dropdown">
                        <span class="user-icon">
                            <i class="icon-copy fa fa-user-circle-o" aria-hidden="true"></i>
                        </span>
                        <span class="user-name">User</span>
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
            <a href="index.html">
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
                    <li>
                        <a href="{{ route('user.AkunTransaksi') }}" class="dropdown-toggle no-arrow active">
                            <span class="micon dw dw-list3"></span><span class="mtext">Akun Transaksi</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('user.JurnalUmum') }}" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-list3"></span><span class="mtext">Jurnal Umum</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('user.JurnalPenyesuaian') }}" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-list3"></span><span class="mtext">Jurnal Penyesuaian</span>
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
                                            <span class="user-name-header">Akun Transaksi</span>
                                        </a>
                                        <p class="mb-0 text-sm">Kelola Akun Transaksi</p>
                                    </div>
                                    <div class="mb-3">
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
                        <table class="data-table table ">
                            <thead>
                                <tr>
                                    {{-- <th class="table-plus datatable-nosort">Name</th> --}}
                                    <th class="table-plus sort_disabled">Kode</th>
                                    <th class="table-plus datatable-nosort">Nama</th>
                                    <th class="table-plus datatable-nosort">Post Saldo</th>
                                    <th class="table-plus datatable-nosort">Post Penyesuaian</th>
                                    <th class="table-plus datatable-nosort">Post Laporan</th>
                                    <th class="table-plus datatable-nosort">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $d)
                                    <tr>
                                        <td class="">{{ $d->kode }}</td>
                                        <td>{{ $d->nama }}</td>
                                        <td>{{ $d->post_saldo == 1 ? 'Debit' : 'Kredit' }} </td>
                                        <td>{{ $d->post_penyesuaian == 1 ? 'Debit' : 'Kredit' }}</td>
                                        <td>{{ $d->post_laporan == 1 ? 'Neraca' : 'Laba Rugi' }}</td>
                                        <td>{{ $d->status }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div id="overlay" onclick="closePopup('popup1')"></div>
        <div id="popup1" class="popup" style="width: 50%;">
            <span class="close" onclick="closePopup('popup1')">&times;</span>
            <form id="addForm" class="model-popup" action="{{ route('user.AkunTransaksistore') }}" method="POST"
                enctype="multipart/form-data" onsubmit="return validateForm()">
                @csrf
                <h4 class="modal-title">Tambah Akun Transaksi</h4>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label" for="kelompok_akun_id">Kelompok Akun</label>
                    <div class="col-sm-12 col-md-10">
                        <select class="custom-select col-12" name="kelompok_akun_id" id="kelompok_akun_id">
                            <option selected>Pilih...</option>
                            @foreach (App\Models\KelompokAkun::all() as $item)
                                <option value="{{ $item->id }}"
                                    {{ old('kelompok_akun_id') == $item->id ? 'selected' : '' }}>{{ $item->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div id="kelompok_laporan">

                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label" for="kode">Kode</label>
                    <div class="col-sm-12 col-md-10">
                        <input type="number" name="kode" class="form-control" placeholder="Masukan Kode"
                            id="kode" value="{{ old('kode') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label" for="nama">Name</label>
                    <div class="col-sm-12 col-md-10">
                        <input type="text" class="form-control" name="nama" placeholder="Masukan Nama"
                            id="nama" value="{{ old('nama') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label" for="post_saldo">Post Saldo</label>
                    <div class="col-sm-12 col-md-10">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="post_saldo1" name="post_saldo"
                                value="1" {{ old('post_saldo') == 1 ? 'checked' : '' }}>
                            <label class="form-check-label" for="post_saldo1">Debit</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="post_saldo2" name="post_saldo"
                                value="2" {{ old('post_saldo') == 2 ? 'checked' : '' }}>
                            <label class="form-check-label" for="post_saldo2">Kredit</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label" for="post_penyesuaian">Post Penyesuaian</label>
                    <div class="col-sm-12 col-md-10">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="post_penyesuaian1"
                                name="post_penyesuaian" value="1"
                                {{ old('post_penyesuaian') == 1 ? 'checked' : '' }}>
                            <label class="form-check-label" for="post_penyesuaian1">Debit</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="post_penyesuaian2"
                                name="post_penyesuaian" value="2"
                                {{ old('post_penyesuaian') == 2 ? 'checked' : '' }}>
                            <label class="form-check-label" for="post_penyesuaian2">Kredit</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label" for="post_laporan">Post Laporan</label>
                    <div class="col-sm-12 col-md-10">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="post_laporan1" name="post_laporan"
                                value="1" {{ old('post_laporan') == 1 ? 'checked' : '' }}>
                            <label class="form-check-label" for="post_laporan1">Neraca</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="post_laporan2" name="post_laporan"
                                value="2" {{ old('post_laporan') == 2 ? 'checked' : '' }}>
                            <label class="form-check-label" for="post_laporan2">Laba Rugi</label>
                        </div>
                    </div>
                    <input type="hidden" name="status" value="pending">
                </div>
                <button type="submit" style="width:100px;" class="btn btn-success">Tambah</button>
            </form>
        </div>
        <script>
            function openPopup(popupId) {
                // $('#editForm')[0].reset();
                $('#addForm')[0].reset();

                document.getElementById(popupId).style.display = 'block';
                document.getElementById("overlay").style.display = "block";

                // $('#editUserId').val(userId);
                // $('#editKelompokAkun').val(userKelompokAkun).change();
                // $('#editKelompokLaporanPosisiKeuangan').val(userKelompokLaporanPosisiKeuangan);
                // $('#editKode').val(userKode);
                // $('#editNama').val(userNama);

                // // Set radio buttons
                // $('input[name="post_saldo"][value="' + postSaldo + '"]').prop('checked', true);
                // $('input[name="post_penyesuaian"][value="' + postPenyesuaian + '"]').prop('checked', true);
                // $('input[name="post_laporan"][value="' + postLaporan + '"]').prop('checked', true);

                // // Set form action
                // $('#editForm').attr('action', "{{ url('admin/AkunTransaksi/update') }}/" + userId);
            }


            function closePopup(popupId) {
                // $('#editForm')[0].reset();
                $('#addForm')[0].reset();
                $("#kelompok_akun_id").val(0).trigger('change');
                document.getElementById(popupId).style.display = 'none';
                document.getElementById("overlay").style.display = "none";
            }
        </script>
        <script>
            function validateForm() {
                // Get form fields
                var kelompokAkun = document.getElementById('kelompok_akun_id').value;
                var kode = document.getElementById('kode').value;
                var nama = document.getElementById('nama').value;
                var postSaldo = document.querySelector('input[name="post_saldo"]:checked');
                var postPenyesuaian = document.querySelector('input[name="post_penyesuaian"]:checked');
                var postLaporan = document.querySelector('input[name="post_laporan"]:checked');

                // Check if all fields are filled
                if (kelompokAkun === "" || kode === "" || nama === "" || !postSaldo || !postPenyesuaian || !postLaporan) {
                    alert("Semua field harus diisi.");
                    return false; // Prevent form submission
                }

                return true; // Allow form submission
            }
        </script>


        <script>
            $(document).ready(function() {
                console.log("Document ready and script loaded"); // Debugging

                $("#kelompok_akun_id").change(function() {
                    console.log("kelompok_akun_id changed to", $(this).val()); // Debugging

                    if ($(this).val() == 1) {
                        $("#kelompok_laporan").html(`
                     <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label" for="kelompok_laporan_posisi_keuangan">Kelompok
                            Laporan Posisi Keuangan</label>
                        <div class="col-sm-12 col-md-10">
                            <select class="custom-select col-12" name="kelompok_laporan_posisi_keuangan" id="kelompok_laporan_posisi_keuangan">
                                <option value="1">Aktiva Lancar</option>
                                <option value="2">Aktiva Tetap</option>
                            </select>
                        </div>
                    </div>
                `);
                    } else if ($(this).val() == 2) {
                        $("#kelompok_laporan").html(`
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label" for="kelompok_laporan_posisi_keuangan">Kelompok
                            Laporan Posisi Keuangan</label>
                        <div class="col-sm-12 col-md-10">
                            <select class="custom-select col-12" name="kelompok_laporan_posisi_keuangan" id="kelompok_laporan_posisi_keuangan">
                                <option value="3">Hutang Lancar</option>
                                <option value="4">Hutang Tetap</option>
                            </select>
                        </div>
                    </div>
                `);
                    } else {
                        $("#kelompok_laporan").html('');
                    }
                });
            });
        </script>
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
</body>

</html>
