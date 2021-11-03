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
                                <select onchange="checkSelectType(this);"
                                    class="form-select form-control form-select-sm @error('motor_cycle') is-invalid @enderror"
                                    name="motor_cycle" id="autoSizingSelect">
                                    <option value="BeAT" {{ old('motor_cycle') == 'BeAT' ? 'selected' : '' }}>
                                        BeAT
                                    </option>
                                    <option value="BeAT Street"
                                        {{ old('motor_cycle') == 'BeAT Street' ? 'selected' : '' }}>
                                        BeAT Street
                                    </option>
                                    <option value="Genio" {{ old('motor_cycle') == 'Genio' ? 'selected' : '' }}>
                                        Genio
                                    </option>
                                    <option value="Scoopy" {{ old('motor_cycle') == 'Scoopy' ? 'selected' : '' }}>
                                        Scoopy
                                    </option>
                                    <option value="Vario 125" {{ old('motor_cycle') == 'Vario 125' ? 'selected' : '' }}>
                                        Vario 125
                                    </option>
                                    <option value="Vario 150" {{ old('motor_cycle') == 'Vario 150' ? 'selected' : '' }}>
                                        Vario 150
                                    </option>
                                    <option value="PCX" {{ old('motor_cycle') == 'PCX' ? 'selected' : '' }}>
                                        PCX
                                    </option>
                                    <option value="ADV 150" {{ old('motor_cycle') == 'ADV 150' ? 'selected' : '' }}>
                                        ADV 150
                                    </option>
                                    <option value="PCX e:HEV" {{ old('motor_cycle') == 'PCX e:HEV' ? 'selected' : '' }}>
                                        PCX e:HEV
                                    </option>
                                    <option value="Forza" {{ old('motor_cycle') == 'Forza' ? 'selected' : '' }}>
                                        Forza
                                    </option>
                                    <option value="CB150 Verza"
                                        {{ old('motor_cycle') == 'CB150 Verza' ? 'selected' : '' }}>
                                        CB150 Verza
                                    </option>
                                    <option value="Sonic 150R"
                                        {{ old('motor_cycle') == 'Sonic 150R' ? 'selected' : '' }}>
                                        Sonic 150R
                                    </option>
                                    <option value="CB150R Streetfire"
                                        {{ old('motor_cycle') == 'CB150R Streetfire' ? 'selected' : '' }}>
                                        CB150R Streetfire
                                    </option>
                                    <option value="CRF150L" {{ old('motor_cycle') == 'CRF150L' ? 'selected' : '' }}>
                                        CRF150L
                                    </option>
                                    <option value="CBR150R" {{ old('motor_cycle') == 'CBR150R' ? 'selected' : '' }}>
                                        CBR150R
                                    </option>
                                    <option value="CBR250RR" {{ old('motor_cycle') == 'CBR250RR' ? 'selected' : '' }}>
                                        CBR250RR
                                    </option>
                                    <option value="Monkey" {{ old('motor_cycle') == 'Monkey' ? 'selected' : '' }}>
                                        Monkey
                                    </option>
                                    <option value="CRF250 RALLY"
                                        {{ old('motor_cycle') == 'CRF250 RALLY' ? 'selected' : '' }}>
                                        CRF250 RALLY
                                    </option>
                                    <option value="Revo X" {{ old('motor_cycle') == 'Revo X' ? 'selected' : '' }}>
                                        Revo X
                                    </option>
                                    <option value="Supra X 125 FI"
                                        {{ old('motor_cycle') == 'Supra X 125 FI' ? 'selected' : '' }}>
                                        Supra X 125 FI
                                    </option>
                                    <option value="GTR 150" {{ old('motor_cycle') == 'GTR 150' ? 'selected' : '' }}>
                                        GTR 150
                                    </option>
                                    <option value="Supercub C125"
                                        {{ old('motor_cycle') == 'Supercub C125' ? 'selected' : '' }}>
                                        Supercub C125
                                    </option>
                                    <option value="CT125" {{ old('motor_cycle') == 'CT125' ? 'selected' : '' }}>
                                        CT125
                                    </option>
                                    <option id="opSelect" {{ old('motor_cycle') == 'Lainnya' ? 'selected' : '' }}>
                                        Lainnya
                                    </option>
                                </select>

                                <div id="ifSel" style="display: none;">
                                    <label class="mt-2">Tipe Motor</label>
                                    <input id="ifInput" oninput="liveInputType()" class="form-control form-control-sm"
                                        type="text" /><br />
                                </div>


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
                                </select>

                                <div id="ifSelYear" style="display: none;">
                                    <label class="mt-2">Tahun Motor</label>
                                    <input oninput="liveInputYear()" class="form-control form-control-sm"
                                        type="text" /><br />
                                </div>

                                @error('year_motor_cycle')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group pb-2">
                                <label class="" for="instagram">Instagram</label>
                                <input id="instagram" type="text" class="form-control form-control-sm" name="instagram"
                                    value="{{ old('instagram') }}" autocomplete="off" autofocus placeholder="@username">
                                @error('instagram')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group pb-2">
                                <label class="" for="phone_number">Nomor Handphone</label>
                                <input id="phone_number" type="text" class="form-control form-control-sm"
                                    name="phone_number" value="{{ old('phone_number') }}" autocomplete="off" autofocus
                                    placeholder="0812312312">
                                @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group pb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" name="newsletter">
                                    <label class="form-check-label" style="margin-top: 3px;" for="flexCheckChecked">
                                        Saya bersedia untuk mengikuti kabar terbaru dari Aktivitas Racing Honda
                                    </label>
                                    @error('newsletter')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group pb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="terms_and_conditions" onclick="terms_changed(this)" name="newsletter">
                                    <label class="form-check-label" style="margin-top: 3px;" for="flexCheckChecked">
                                        Saya menyetujui <a href="{{url('syarat-dan-ketentuan')}}" style="color: #ec1a30"> syarat dan ketentuan</a> yang berlaku
                                    </label>
                                    @error('newsletter')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="cta-area">
                            <button type="submit" id="submit_button" class="pushable" disabled>REGISTER</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function terms_changed(termsCheckBox){
    //If the checkbox has been checked
    if(termsCheckBox.checked){
        //Set the disabled property to FALSE and enable the button.
        document.getElementById("submit_button").disabled = false;
    } else{
        //Otherwise, disable the submit button.
        document.getElementById("submit_button").disabled = true;
    }
}
</script>
@endsection
