@extends('layouts.layout-general')

@section('title')
<title>Kirim Reset Password</title>
@endsection

@section('content')

<div class="container p-3 login-area mw-600">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body p-4 pb-3">
                    <div class="pb-2">
                        <h1 class="text-center pt-4">Lupa Password</h1>
                        <p class="text-center text-info">Mohon masukkan alamat email yang terdaftar, kamu akan menerima
                            link untuk membuat password baru lewat email.</p>
                        @if (session('status'))
                        <div class="alert text-info" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                    </div>
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="form-group pb-2">
                            @if(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                            </div>
                            @endif
                            <input type="email" class="form-control @if($errors->first('email')) is-invalid @endif"
                                name="email" value="{{ old('email') }}" required autocomplete="off" autofocus
                                placeholder="Masukan Email">
                            @if ($errors->first('email'))
                            <span class="invalid-feedback" role="alert" style="color: aliceblue">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="cta-area">
                            <button type="submit" class="btn btn-sm btn-primary">
                                KIRIM
                            </button>
                            <div class="pt-3">
                                Sudah ingat? <a class="text-mute pt-3" href="{{ url('login') }}">Login</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection