<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Forgot Password </title>
    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('tmplt/vendors/images/sks.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('tmplt/vendors/images/sks.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('tmplt/vendors/images/sks.png') }}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('lte/dist/css/adminlte.min.css') }}">
</head>
<style>
    body.fading {
        opacity: 0;
        transition: opacity 2s ease-in-out;
    }

    .background-container {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
        z-index: -1;
        transition: background 2s ease-in-out;
    }

    .background-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    body {
        padding-top: 40px;
    }

    .container-fluid {
        max-width: 100%;
        margin: 0 auto;
        padding: 10px;
    }

    .card {
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        background-color: #f8f9fa;
        border-bottom: none;
        padding: 20px 30px;
        font-size: 24px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .card-header img {
        max-width: 100%;
        /* IE8 */
        display: block;
        margin: 0 auto;
    }

    .card-header .header-content {
        flex: 1;
        text-align: center;
    }

    .card-header .header-content:last-child {
        text-align: right;
    }

    .card-body {
        padding: 30px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .btn-primary {
        background-color: #12ACED;
        border-color: #12ACED;
        padding: 12px 20px;
        font-size: 16px;
        border-radius: 5px;
        width: 100%;
    }

    .btn-primary:hover {
        background-color: #0069d9;
        border-color: #0062cc;
    }

    .btn-block {
        display: block;
    }

    .mt-4 {
        margin-top: 1.5rem;
    }

    .text-center {
        text-align: center;
    }

    .text-center a {
        color: #007bff;
    }

    .img-container {
        text-align: center;
        margin-bottom: 20px;
    }

    .img-container img {
        max-width: 100%;
        height: auto;
        width: auto\9;
        /* IE8 */
    }

    .alert {
        margin-bottom: 0;
    }
</style>

<body class="hold-transition login-page">

    <div class="container-fluid">

        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <div class="background-container">
                    </div>
                    <div class="img-container d-flex justify-content-between" style="margin-top: 20px;">
                    </div>
                    <h2 class="text-center" style="margin-top: 5px; font-weight: bold;">FORGOT PASSWORD </h2>
                    <div class="card-body login-form">
                        <!-- Session Status -->
                        @if (session('status'))
                            <div class="alert alert-success mb-4">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="form-group">
                                <label for="email" class="form-label">{{ __('Email') }}</label>
                                <input type="email" id="email" name="email" class="form-control"
                                    value="{{ old('email') }}" required autofocus>
                                @if ($errors->has('email'))
                                    <div class="text-danger mt-2">{{ $errors->first('email') }}</div>
                                @endif
                            </div>
                            <div class="flex items-center justify-end mt-4">
                                <button type="submit" class="btn btn-primary text-dark">
                                    {{ __('Email Password Reset Link') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <script src="{{ asset('lte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}">
        < /> <!--AdminLTE App-- >
        <
        script src = "{{ asset('lte/dist/js/adminlte.min.js') }}" >
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</body
