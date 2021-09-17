<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login Amazing Race</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/be9f755eb3.js"></script>
</head>

<body>
    <div class="container p-5 bg-white">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="pb-2">
                            <h4 class="text-center">Login AHRT</h4>
                        </div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            @if(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                            </div>
                            @endif

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="">
                                    Email
                                </label>
                                <input type="email"
                                    class="form-control form-control-sm @if($errors->first('email')) is-invalid @endif"
                                    name="email" value="{{ old('email') }}" required autocomplete="off" autofocus>
                                @if ($errors->first('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}}</strong>
                                </span>
                                @endif
                            </div>

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

                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }} style="font-size: 14px;">
                                    Remember me
                                </label>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-sm btn-primary">
                                    <i class="fa fa-sign-in" aria-hidden="true"></i> Login
                                </button>
                                @if (Route::has('password.request'))
                                <a class="text-mute" style="font-size: 12px;" href="{{ route('password.request') }}">
                                    Lupa Password?
                                </a>
                                @endif
                            </div>

                        </form>
                    </div>
                </div>

                <div class="d-grid gap-2 pt-2">
                    {{-- <button class="btn btn-sm btn-primary" type="button"><i class="bi bi-google"></i> Login
                        with
                        google</button> --}}
                    <a href="{{ url('register') }}" class="nav-link">
                        Belum punya akun? Register
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