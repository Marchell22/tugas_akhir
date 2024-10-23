<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>Sistem Informasi Akutansi - PT Sinar Kaliman Sehat</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // Setup CSRF token in AJAX request
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

        });
    </script>

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

        #popup1 {
            display: none;
            /* Initially hidden */
            position: fixed;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            width: 100%;
            height: 100%;
            max-width: 2000px;
            /* Lebar maksimum */
            max-height: 1000px;
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
                    <li class="dropdown ">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-list3"></span><span class="mtext">Data Akun Transaksi</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="{{ route('admin.AkunTransaksi') }}">Kelola Akun Transaksi</a></li>
                            <li><a href="{{ route('admin.ValidasiTransaksi') }}">Menu Validasi</a></li>
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
                        <a href="{{ route('admin.RencanaAnggaranBiaya') }}" class="dropdown-toggle no-arrow active">
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
                <div class="page-header">
                    <div class="row">
                        <div class="col">
                            <div class="title">
                                <div
                                    class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-md-between text-center text-md-left">
                                    <div class="mb-3">
                                        <a class="dropdown-toggle no-arrow" role="">
                                            <span class="user-name-header">Rencana Anggaran Biaya</span>
                                        </a>
                                        <p class="mb-0 text-sm">Kelola Rencana Anggaran Biaya</p>
                                    </div>
                                    <div class="mb-3">
                                        <a class="btn btn-success show-modal"
                                            href="{{ route('admin.RencanaAnggaranBiaya') }}" title="Tambah">
                                            <i class="icon-copy ion-arrow-left-c"
                                                style="font-size: 30px; color:white"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-box mb-30">
                    <div class="pb-10 pd-2">
                        <div class="page-header">
                            <div class="row">
                                <div class="col">
                                    <table>
                                        <form class="model-popup"
                                            action="{{ route('admin.RencanaAnggaranBiayastore') }}" method="POST">
                                            @csrf
                                            <h4 class="modal-title">Tambah Rencana Anggaran Biaya</h4>
                                            <div class="form-group row">
                                                <label class="col-sm-12 col-md-2 col-form-label">Bidang</label>
                                                <div class="col-sm-12 col-md-10">
                                                    <input type="text" name="bidang" class="form-control"
                                                        placeholder="Masukan Nama">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-12 col-md-2 col-form-label">Kegiatan</label>
                                                <div class="col-sm-12 col-md-10">
                                                    <input type="text" name="kegiatan" class="form-control"
                                                        placeholder="Masukan Kegiatan">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-12 col-md-2 col-form-label">Waktu
                                                    Pelaksanaan</label>
                                                <div class="col-sm-12 col-md-10">
                                                    <input type="text" name="waktu_pelaksanaan"
                                                        class="form-control" placeholder="Masukan Waktu Pelaksanaan">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label
                                                    class="col-sm-12 col-md-2 col-form-label">Output/Keluaran</label>
                                                <div class="col-sm-12 col-md-10">
                                                    <input type="text" name="output" class="form-control"
                                                        placeholder="Masukan Keluaran">
                                                </div>
                                            </div>

                                            <table class="table table-bordered bordered" id="table">
                                                <thead>
                                                    <tr>
                                                        <th>Uraian Pekerjaan</th>
                                                        <th>Satuan</th>
                                                        <th>Volume</th>
                                                        <th>Harga Satuan</th>
                                                        <th>Total Harga</th>
                                                        <th><a href="javascript:void(0)"
                                                                class="btn btn-success btn-sm addRowCategory"
                                                                style="font-size: 10px; width: 100px; height: 60px; display: flex; align-items: center; justify-content: center;">Add
                                                                Row</a></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <!-- Rows will be added here -->
                                                </tbody>
                                            </table>

                                            <button type="submit" class="btn btn-success"
                                                style="width: 100px;">Tambah</button>
                                        </form>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                let nextId = 1; // Initialize ID counter

                function calculateTotal(row) {
                    var volume = row.find('.volume').val();
                    var harga_satuan = row.find('.harga_satuan').val();
                    var total_harga = row.find('.total_harga');
                    var total = (volume * harga_satuan) || 0;
                    total_harga.val(total);
                }

                // Event listener for calculating total price
                $('#table').on('input', '.volume, .harga_satuan', function() {
                    var row = $(this).closest('tr');
                    calculateTotal(row);
                });

                // Event listener for adding a new row
                $('#table').on('click', '.addRowCategory', function(e) {
                    e.preventDefault(); // Prevent default link behavior

                    // Create new row with unique ID
                    var tr = `<tr>
            <td><input type="hidden" name="uraian_pekerjaan[${nextId}][id]" value="${nextId}"><input type="text" name="uraian_pekerjaan[${nextId}][uraian_pekerjaan]" class="form-control"></td>
            <td><input type="text" name="uraian_pekerjaan[${nextId}][satuan]" class="form-control"></td>
            <td><input type="number" name="uraian_pekerjaan[${nextId}][volume]" class="form-control volume"></td>
            <td><input type="number" name="uraian_pekerjaan[${nextId}][harga_satuan]" class="form-control harga_satuan"></td>
            <td><input type="number" name="uraian_pekerjaan[${nextId}][total_harga]" class="form-control total_harga" readonly></td>
            <td><a href="javascript:void(0)" class="btn btn-danger btn-sm deleteRow">-</a></td>
        </tr>`;

                    // Append new row to table
                    $('#table').find('tbody').append(tr);

                    // Increment ID counter for next row
                    nextId++;
                });

                // Event listener for deleting a row
                $('#table').on('click', '.deleteRow', function(e) {
                    e.preventDefault(); // Prevent default link behavior
                    $(this).closest('tr').remove();
                });

                // Event listener for form submission
                $('.model-popup').on('submit', function(e) {
                    e.preventDefault();

                    var formData = $(this).serializeArray();
                    var formObject = {};
                    var uraianPekerjaan = [];

                    // Gather data from each row in the table
                    $('#table tbody tr').each(function() {
                        var row = $(this);
                        var rowObject = {
                            id: row.find('input[name$="[id]"]')
                                .val(), // Extract the ID from the input field
                            uraian_pekerjaan: row.find('input[name$="[uraian_pekerjaan]"]').val(),
                            satuan: row.find('input[name$="[satuan]"]').val(),
                            volume: row.find('input[name$="[volume]"]').val(),
                            harga_satuan: row.find('input[name$="[harga_satuan]"]').val(),
                            total_harga: row.find('input[name$="[total_harga]"]').val()
                        };
                        uraianPekerjaan.push(rowObject);
                    });

                    // Add other form data to formObject
                    formData.forEach(function(item) {
                        if (!item.name.startsWith('uraian_pekerjaan[')) {
                            formObject[item.name] = item.value;
                        }
                    });

                    // Combine form data and uraianPekerjaan
                    formObject['uraian_pekerjaan'] = JSON.stringify(uraianPekerjaan);

                    console.log('Formatted form data:', formObject);

                    // Submit the form data via AJAX
                    $.ajax({
                        type: 'POST',
                        url: $(this).attr('action'),
                        data: JSON.stringify(formObject), // Stringify the entire formObject
                        contentType: 'application/json', // Set content type to JSON
                        success: function(response) {
                            if (response.redirect) {
                                // Redirect to the specified URL
                                window.location.href = response.redirect;
                            } else {
                                console.log('Form submitted successfully');
                                // Optionally, handle success without a redirect
                            }
                        },
                        error: function(xhr) {
                            console.log('Error:', xhr.responseText);
                            try {
                                // Mencoba untuk mengurai respons JSON
                                var errorResponse = JSON.parse(xhr.responseText);
                                alert('Error: ' + errorResponse
                                    .message); // Menampilkan pesan error dalam alert
                            } catch (e) {
                                // Jika respons bukan JSON
                                alert('Terjadi kesalahan saat mengirim form: ' + xhr.status + ' ' +
                                    xhr.statusText);
                            }
                        }
                    });
                });
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
