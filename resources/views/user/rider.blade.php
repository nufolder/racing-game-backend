@extends('layouts.app-user')

@section('title')
<title>Pilih Rider</title>
@endsection

@section('content')

<div class="container pt-3 select-class-rider mw-600 minh">

    <div class="row d-flex justify-content-center">
        @if (session('message'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {!! session('message') !!}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="pb-2">
            <img src="{{ asset('images/logo-generasi-juara.png') }}" class="img-fluid">
            <h1 class="text-center mt-3 text-white">Pilih Kelas Rider</h1>
        </div>

        <div class="row ">
            <div class="col-6 item p-2">
                <div class="card @if ($ttc_atc == false) {{ 'not-active' }} @endif">
                    <div class="card-body">
                        <p class="card-text text-center small">thailand talent cup</p>
                        <!-- <img src="{{ asset('images/logo-ttc.jpg') }}" class="img-fluid"> -->
                    </div>
                    <div class="cta-area text-center bg-transparent border-light">
                        <center>
                            @if ($ttc_atc == false)
                            <a href="{{ url('unlock/class/ttc_atc') }}" class="btn btn-round"><img
                                    src="{{ asset('images/badge-coin.png') }}">20</a>
                            @else
                            <a class="btn btn-round" data-bs-toggle="modal" data-bs-target="#ttc_atc">Pilih</a>
                            @endif
                        </center>
                    </div>
                </div>

            </div>
            <div class="col-6 item p-2">
                <div class="card @if ($arrc_ap250 == false) {{ 'not-active' }} @endif">
                    <div class="card-body">
                        <p class="card-text text-center small">asia road racing championship AP250</p>
                        <!-- <img src="{{ asset('images/logo-atc.jpg') }}" class="img-fluid"> -->
                    </div>
                    <div class="cta-area text-center bg-transparent border-light">
                        <center>
                            @if ($arrc_ap250 == false)
                            <a href="{{ url('unlock/class/arrc_ap250') }}" class="btn btn-round"><img
                                    src="{{ asset('images/badge-coin.png') }}">40</a>
                            @else
                            <a class="btn btn-round" data-bs-toggle="modal" data-bs-target="#arrc_ap250">Pilih</a>
                            @endif
                        </center>
                    </div>
                </div>
            </div>

            <div class="col-6 item p-2">
                <div class="card @if ($arrc_ss600 == false) {{ 'not-active' }} @endif">
                    <div class="card-body">
                        <p class="card-text text-center small">asia road racing championship SS600</p>
                        <!-- <img src="{{ asset('images/logo-arrc.jpg') }}" class="img-fluid"> -->
                    </div>
                    <div class="cta-area text-center bg-transparent border-light">
                        <center>
                            @if ($arrc_ss600 == false)
                            <a href="{{ url('unlock/class/arrc_ss600') }}" class="btn btn-round"><img
                                    src="{{ asset('images/badge-coin.png') }}">60</a>
                            @else
                            <a class="btn btn-round" data-bs-toggle="modal" data-bs-target="#arrc_ss600">Pilih</a>
                            @endif
                        </center>
                    </div>
                </div>
            </div>
            <div class="col-6 item p-2">
                <div class="card @if ($cev == false) {{ 'not-active' }} @endif">
                    <div class="card-body">
                        <p class="card-text text-center small">Junior motor<br>CEV</p>
                        <!-- <img src="{{ asset('images/logo-cev.jpg') }}" class="img-fluid"> -->
                    </div>
                    <div class="cta-area text-center bg-transparent border-light">
                        <center>
                            @if ($cev == false)
                            <a href="{{ url('unlock/class/cev') }}" class="btn btn-round"><img
                                    src="{{ asset('images/badge-coin.png') }}">80</a>
                            @else
                            <a class="btn btn-round" data-bs-toggle="modal" data-bs-target="#cev">Pilih</a>
                            @endif
                        </center>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-4 mb-5">
            <center><a href="{{ url('home') }}" class="btn w-50">HOME</a></center>
        </div>
    </div>

    @include('user.modal-pick-riders')


</div>

@endsection