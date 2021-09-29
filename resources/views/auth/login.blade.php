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
        ntegrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
                            <h1 class="text-center pt-4">Welcome to Amazing Race</h1>
                        </div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group pb-2">
                                <label for="exampleInputEmail1" class="">Email</label>
                                @if(session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('error') }}
                                </div>
                                @endif
                                <input type="email"
                                    class="form-control form-control-sm @if($errors->first('email')) is-invalid @endif"
                                    name="email" value="{{ old('email') }}" required autocomplete="off" autofocus>
                                @if ($errors->first('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group pb-2">
                                <label for="exampleInputPassword1" class="">Password</label>
                                <div class="input-group pb-2" id="login_show_hide_password">
                                    <input type="password"
                                        class="form-control form-control-sm @error('password') is-invalid @enderror"
                                        name="password" required autocomplete="off" id="password"
                                        placeholder="Password">
                                    <div class="input-group-text">
                                        <div class="input-group-addon">
                                            <a href=""><i class="text-dark fa fa-eye-slash" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert" style="color: aliceblue">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group pb-2 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }} style="font-size: 14px;">
                                    Remember me
                                </label>
                            </div>
                            <div class="cta-area">
                                <button type="submit" class="btn btn-sm btn-primary">
                                    Login <i class="fa fa-sign-in" aria-hidden="true"></i>
                                </button>
                                @if (Route::has('password.request'))
                                <div class="pt-3">
                                    <a class="text-mute pt-3" style="font-size: 12px;"
                                        href="{{ route('password.request') }}">Lupa Password?</a>
                                </div>
                                @endif
                            </div>

                        </form>
                    </div>
                </div>

                <div class="text-center pb-5">
                    {{-- <button class="btn btn-sm btn-primary" type="button"><i class="bi bi-google"></i> Login
                        with
                        google</button> --}}
                    Belum punya akun? <a href="{{ url('register') }}">Register</a>
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