<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Register Amazing Race</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/be9f755eb3.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Questrial&family=Russo+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>

<body>
    <div class="container p-3 auth-area">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body p-5 pb-3">
                        <div class="pb-2">
                            <center><img src="{{ asset('images/ahrt-logo.png') }}"></center>
                            <h1 class="text-center pt-4">Welcome To Amazing Race</h1>
                        </div>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="row">

                                @if (session()->has('message'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('message') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                                @endif

                                <div class="form-group pb-2">
                                    <label class="" for="name">Nama</label>
                                    <input id="name" type="text"
                                        class="form-control form-control-sm @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required autocomplete="off" autofocus
                                        placeholder="Nama">

                                    @error('name')
                                    <span class="invalid-feedback" role="alert" style="color: aliceblue">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group pb-2">
                                    <label class="" for="email">Email</label>
                                    <input type="email"
                                        class="form-control form-control-sm @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="off" autofocus
                                        placeholder="Email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert" style="color: aliceblue">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group pb-2">
                                    <label class="" for="password">Password</label>
                                    <div class="input-group pb-2" id="show_hide_password">
                                        <input type="password"
                                            class="form-control form-control-sm @error('password') is-invalid @enderror"
                                            name="password" required autocomplete="off" id="password"
                                            placeholder="Password">
                                        <div class="input-group-text">
                                            <div class="input-group-addon">
                                                <a href=""><i class="text-dark fa fa-eye-slash"
                                                        aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert" style="color: aliceblue">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group pb-2" id="show_hide_password_confirmation">
                                    <label class="" for="password-confirm">Konfirmasi Password</label>
                                    <input id="password-confirm" type="password"
                                        class="form-control form-control-sm @error('password') is-invalid @enderror"
                                        name="password_confirmation" required autocomplete="off"
                                        placeholder="Konfirmasi Password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert" style="color: aliceblue">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group pb-2">
                                    <label class="" for="autoSizingSelect">Tipe Motor Kamu Sekarang</label>
                                    <select
                                        class="form-select form-select-sm @error('motor_cycle') is-invalid @enderror"
                                        name="motor_cycle" id="autoSizingSelect">
                                        <option value="Tidak ada" {{ old('title') == 'Tidak ada' ? 'selected' : '' }}>
                                            Tidak ada
                                        </option>
                                        <option value="Vario" {{ old('title') == 'Vario' ? 'selected' : '' }}>
                                            Vario
                                        </option>
                                        <option value="Beat" {{ old('title') == 'Beat' ? 'selected' : '' }}>
                                            Beat
                                        </option>
                                        <option value="CBR 150" {{ old('title') == 'CBR 150' ? 'selected' : '' }}>
                                            CBR 150
                                        </option>
                                    </select>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group pb-2">
                                    <label class="" for="autoSizingSelect">Tahun Motor Kamu</label>
                                    <select
                                        class="form-select form-select-sm @error('year_motor_cycle') is-invalid @enderror"
                                        name="year_motor_cycle" id="autoSizingSelect">
                                        <option value="Tidak ada" {{ old('title') == 'Tidak ada' ? 'selected' : '' }}>
                                            Tidak ada
                                        </option>
                                        <option value="2015" {{ old('title') == '2015' ? 'selected' : '' }}>
                                            2015
                                        </option>
                                        <option value="2016" {{ old('title') == '2016' ? 'selected' : '' }}>
                                            2016
                                        </option>
                                        <option value="2017" {{ old('title') == '2017' ? 'selected' : '' }}>
                                            2017
                                        </option>
                                    </select>
                                    @error('year_motor_cycle')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="cta-area">
                                <button type="submit" class="pushable">Register</button>
                            </div>

                        </form>
                    </div>
                </div>

                <div class="text-center pb-5">
                    {{-- <button class="btn btn-sm btn-primary" type="button"><i class="bi bi-google"></i> Register with google</button> --}}
                    Sudah punya akun? <a href="{{ url('login') }}">Login</a>

                </div>


            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/custom.js') }}"></script>

</body>

</html>