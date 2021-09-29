@extends('layouts.layout-general')

@section('title')
<title>Kirim Reset Password</title>
@endsection

@section('content')

<div class="container p-3 auth-area">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body p-5 pb-3">
                    <div class="pb-2">
                        <center><img src="{{ asset('images/ahrt-logo.png') }}"></center>
                        <h3 class="text-center pt-4">Reset Password</h3>
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
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