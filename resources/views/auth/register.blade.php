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
    <<script src="https://use.fontawesome.com/be9f755eb3.js">
        </script>
</head>

<body>
    <div class="container p-5 bg-white">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="pb-2">
                            <h4 class="text-center">Register AHRT</h4>
                        </div>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="row">


                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="exampleInputName" class="">
                                            Nama
                                        </label>
                                        <input id="name" type="text"
                                            class="form-control form-control-sm @error('name') is-invalid @enderror"
                                            name="name" value="{{ old('name') }}" required autocomplete="off" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="">
                                            Email
                                        </label>
                                        <input type="email"
                                            class="form-control form-control-sm @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" required autocomplete="off"
                                            autofocus>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="" for="autoSizingSelect">
                                            Motor
                                        </label>
                                        <select
                                            class="form-select form-select-sm @error('motor_cycle') is-invalid @enderror"
                                            name="motor_cycle" id="autoSizingSelect">
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

                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="">Password</label>
                                        <input type="password"
                                            class="form-control form-control-sm @error('password') is-invalid @enderror"
                                            name="password" required autocomplete="off" id="exampleInputPassword1">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="">
                                            Konfirmasi Password
                                        </label>
                                        <input id="password-confirm" type="password"
                                            class="form-control form-control-sm @error('password') is-invalid @enderror"
                                            name="password_confirmation" required autocomplete="off">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="" for="autoSizingSelect">
                                            Tahun Motor
                                        </label>
                                        <select
                                            class="form-select form-select-sm @error('year_motor_cycle') is-invalid @enderror"
                                            name="year_motor_cycle" id="autoSizingSelect">
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
                            </div>



                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-sm btn-primary">
                                    <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i> Register
                                </button>
                            </div>

                        </form>
                    </div>
                </div>

                <div class="d-grid gap-2">
                    {{-- <button class="btn btn-sm btn-primary" type="button"><i class="bi bi-google"></i> Register
                                with
                                google</button> --}}
                    <a href="{{ url('login') }}" class="nav-link">
                        Sudah punya aku? Login
                    </a>
                </div>


            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
            integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
            integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
        </script>

</body>

</html>