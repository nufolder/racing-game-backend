@extends('layouts.layout-general')

@section('title')
<title>Login</title>
@endsection

@section('content')
<div class="container p-3 login-area">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body p-4 pb-3">
                    <div class="pb-2">
                        <h1 class="text-center pt-4">Login</h1>
                        <p class="text-center text-info">Mohon masukkan alamat email yang terdaftar untuk kembali bermain</p>
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
                                    name="password" required autocomplete="off" id="password" placeholder="Password">
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
                                LOGIN
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

            <div class="text-center pb-5 login-text-info">
                {{-- <button class="btn btn-sm btn-primary" type="button"><i class="bi bi-google"></i> Login
                        with
                        google</button> --}}
                Belum punya akun? <a href="{{ url('register') }}">Register</a>
            </div>


        </div>
    </div>
</div>

@endsection