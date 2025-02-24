@extends('auth.app')
@section('content')
    <style>
        body {
            padding-top: 40px;
        }

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
                        <div class="text-center" style="margin-top: 15px;">
                            <img src="{{ asset('tmplt/vendors/images/sks.png') }}" alt="SKS Logo"
                                style="max-width: 100px; height: auto;">
                        </div>
                        <h1 class="text-center" style="margin-top: 5px; font-weight: bold;">LOGIN </h1>
                        <div class="card-body login-form">
                            <form method="POST" action="{{ route('login-proses') }}">
                                @csrf

                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="text" name="email" class="form-control" id="email" required>
                                </div>
                                @if ($errors->has('email'))
                                    <div class="text-danger mt-2">
                                        @foreach ($errors->get('email') as $message)
                                            <p>{{ $message }}</p>
                                        @endforeach
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label for="password">Password:</label>
                                    <input type="password" name="password" class="form-control" id="password" required>
                                </div>
                                @if ($errors->has('password'))
                                    <div class="text-danger mt-2">
                                        @foreach ($errors->get('password') as $message)
                                            <p>{{ $message }}</p>
                                        @endforeach
                                    </div>
                                @endif
                                <div class="flex items-center justify-end mt-4">
                                    @if (Route::has('password.request'))
                                        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                                            href="{{ route('password.request') }}">
                                            {{ __('Forgot your password?') }}
                                        </a>
                                    @endif

                                </div>

                                <div class="text-center mt-4">
                                    <button type="submit" class="btn btn-primary btn-block" name="login"><a
                                            href="/beranda" style="color:#fff "><b>Login</a></b></button>
                                </div>
                            </form>
                            <!-- Menampilkan Pop-Up Alert -->
                            @if (session('error'))
                                <script>
                                    window.onload = function() {
                                        alert("{{ session('error') }}");
                                    };
                                </script>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </body>


@endsection
