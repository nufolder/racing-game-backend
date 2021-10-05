@extends('layouts.layout-general')

@section('title')
<title>Reset Password</title>
@endsection

@section('content')

<div class="container p-3 login-area">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body p-3 pb-3">
                    <div class="pb-2">
                        <center><img src="{{ asset('images/ahrt-logo.png') }}"></center>
                        <h1 class="text-center pt-4">Silahkan ganti password</h1>
                        <p class="text-center text-info">Mohon masukkan password yang baru</p>                        
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                    </div>
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="form-group pb-2">
                            @if(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                            </div>
                            @endif
                            <input type="email" class="form-control @if($errors->first('email')) is-invalid @endif"
                                name="email" value="{{ $email ?? old('email') }}" required autocomplete="off" autofocus
                                placeholder="Masukan Email">
                            @if ($errors->first('email'))
                            <span class="invalid-feedback" role="alert" style="color: aliceblue">
                                <strong>{{ $errors->first('email') }}}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group pb-2">
                            <label class="" for="password">Password</label>
                            <div class="input-group pb-2" id="show_hide_password">
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

                        <div class="cta-area">
                            <button type="submit" class="btn btn-sm btn-primary">
                                Submit <i class="fa fa-sign-in" aria-hidden="true"></i>
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>





@endsection