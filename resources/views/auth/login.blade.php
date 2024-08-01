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
                    <h2 class="text-center" style="margin-top: 5px; font-weight: bold;">LOGIN </h2>
                    <div class="card-body login-form">
                        <form method="POST" action="{{ route('login-proses') }}">
                            @csrf
                            
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" name="username" class="form-control" id="username" required>
                            </div>
                            @error('username')
                            <small>{{ $username }}</small>
                            @enderror
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" name="password" class="form-control" id="password" required>
                            </div>
                            @error('password')
                            <small>{{ $password }}</small>
                            @enderror

                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary btn-block" name="login"><a href="/beranda"
                                        style="color:#fff "><b>Login</a></b></button>
                            </div>
                        
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
</body>


@endsection
