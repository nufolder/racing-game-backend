@extends('layouts.layout-general')

@section('title')
<title>Register</title>
@endsection

@section('content')
<div class="container p-3 auth-area">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body p-4 pb-3">
                    <div class="pb-0">
                        <h1 class="pt-4">Registrasi</h1>
                        <p class="links">Sudah punya akun? <a href="{{ url('login') }}">Login disini</a></p>
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
                                    class="form-control form-control-sm @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" required autocomplete="off" autofocus placeholder="Nama">

                                @error('name')
                                <span class="invalid-feedback" role="alert">
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
                                <span class="invalid-feedback" role="alert">
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
                                            <a href=""><i class="text-dark fa fa-eye-slash" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
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
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group pb-2">
                                <label class="" for="autoSizingSelect">Tipe Motor Kamu Sekarang</label>
                                <select
                                    class="form-select form-control form-select-sm @error('motor_cycle') is-invalid @enderror"
                                    name="motor_cycle" id="autoSizingSelect">
                                    <option value="Vario" {{ old('title') == 'Vario' ? 'selected' : '' }}>
                                        Vario
                                    </option>
                                    <option value="Beat" {{ old('motor_cycle') == 'Beat' ? 'selected' : '' }}>
                                        Beat
                                    </option>
                                    <option value="CBR 150" {{ old('motor_cycle') == 'CBR 150' ? 'selected' : '' }}>
                                        CBR 150
                                    </option>
                                    <option value="Lainnya" {{ old('motor_cycle') == 'Lainnya' ? 'selected' : '' }}>
                                        Lainnya
                                    </option>
                                </select>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group pb-2">
                                <label class="" for="autoSizingSelectYear">Tahun Motor Kamu</label>
                                <select
                                    class="form-select form-control form-select-sm @error('year_motor_cycle') is-invalid @enderror"
                                    name="year_motor_cycle" id="autoSizingSelectYear">
                                    <option value="2021" {{ old('year_motor_cycle') == '2021' ? 'selected' : '' }}>
                                        2021
                                    </option>
                                    <option value="2020" {{ old('year_motor_cycle') == '2020' ? 'selected' : '' }}>
                                        2020
                                    </option>
                                    <option value="2019" {{ old('year_motor_cycle') == '2019' ? 'selected' : '' }}>
                                        2019
                                    </option>
                                    <option value="2018" {{ old('year_motor_cycle') == '2018' ? 'selected' : '' }}>
                                        2018
                                    </option>
                                    <option value="2017" {{ old('year_motor_cycle') == '2017' ? 'selected' : '' }}>
                                        2017
                                    </option>
                                    <option value="2016" {{ old('year_motor_cycle') == '2016' ? 'selected' : '' }}>
                                        2016
                                    </option>
                                    <option value="2015" {{ old('year_motor_cycle') == '2015' ? 'selected' : '' }}>
                                        2015
                                    </option>
                                    <option value="2014" {{ old('year_motor_cycle') == '2014' ? 'selected' : '' }}>
                                        2014
                                    </option>
                                    <option value="2013" {{ old('year_motor_cycle') == '2013' ? 'selected' : '' }}>
                                        2013
                                    </option>
                                    <option value="2012" {{ old('year_motor_cycle') == '2012' ? 'selected' : '' }}>
                                        2012
                                    </option>
                                    <option value="2011" {{ old('year_motor_cycle') == '2011' ? 'selected' : '' }}>
                                        2011
                                    </option>
                                    <option value="2010" {{ old('year_motor_cycle') == '2010' ? 'selected' : '' }}>
                                        2010
                                    </option>
                                    <option value="lainnya"
                                        {{ old('year_motor_cycle') == 'lainnya' ? 'selected' : '' }}>
                                        Lainnya
                                    </option>
                                </select>
                                @error('year_motor_cycle')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group pb-2">
                                <label class="" for="name">Instagram</label>
                                <input id="name" type="text" class="form-control form-control-sm" name="instagram"
                                    value="{{ old('instagram') }}" required autocomplete="off" autofocus
                                    placeholder="@username">
                            </div>
                        </div>



                        <div class="cta-area">
                            <button type="submit" class="pushable">REGISTER</button>
                        </div>

                    </form>
                </div>
            </div>


        </div>
    </div>
</div>