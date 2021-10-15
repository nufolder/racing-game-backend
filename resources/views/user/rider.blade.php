@extends('layouts.app-user')

@section('title')
<title>Pilih Rider</title>
@endsection

@section('content')

<div class="container pt-3 select-class-rider mw-600">

    <div class="row d-flex justify-content-center">
            @if (session('message'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="pb-2">
                <img src="{{ asset('images/logo-generasi-juara.png') }}" class="img-fluid">
                <h1 class="text-center mt-3 text-white">Pilih Kelas Rider</h1>
            </div>

            <div class="row ">
                <div class="col-6 item p-2">
                    <div class="card @if ($ttc == false) {{ 'not-active' }} @endif">
                        <div class="card-body">
                            <p class="card-text text-center small">thailand talent cup</p>
                            <!-- <img src="{{ asset('images/logo-ttc.jpg') }}" class="img-fluid"> -->
                        </div>
                        <div class="cta-area text-center bg-transparent border-light">
                            <center>
                            @if ($ttc == false)
                            <a href="{{ url('unlock/class/ttc') }}" class="btn btn-round"><img src="{{ asset('images/badge-coin.png') }}">20</a>
                            @else
                            <a class="btn btn-round" data-bs-toggle="modal" data-bs-target="#ttc">Pilih</a>
                            @endif
                            </center>
                        </div>
                    </div>

                </div>
                <div class="col-6 item p-2">
                    <div class="card @if ($atc == false) {{ 'not-active' }} @endif">
                        <div class="card-body">
                            <p class="card-text text-center small">asia<br>talent cup</p>
                            <!-- <img src="{{ asset('images/logo-atc.jpg') }}" class="img-fluid"> -->
                        </div>
                        <div class="cta-area text-center bg-transparent border-light">
                            <center>
                            @if ($atc == false)
                            <a href="{{ url('unlock/class/ttc') }}" class="btn btn-round"><img src="{{ asset('images/badge-coin.png') }}">40</a>
                            @else
                            <a class="btn btn-round" data-bs-toggle="modal" data-bs-target="#atc">Pilih</a>
                            @endif
                            </center>
                        </div>
                    </div>
                </div>

                <div class="col-6 item p-2">
                    <div class="card @if ($cev == false) {{ 'not-active' }} @endif">
                        <div class="card-body">
                            <p class="card-text text-center small">asia road racing championship</p>
                            <!-- <img src="{{ asset('images/logo-arrc.jpg') }}" class="img-fluid"> -->
                        </div>
                        <div class="cta-area text-center bg-transparent border-light">
                            <center>
                            @if ($arrc == false)
                            <a href="{{ url('unlock/class/arrc') }}" class="btn btn-round"><img src="{{ asset('images/badge-coin.png') }}">60</a>
                            @else
                            <a class="btn btn-round" data-bs-toggle="modal" data-bs-target="#arrc">Pilih</a>
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
                            <a href="{{ url('unlock/class/cev') }}" class="btn btn-round"><img src="{{ asset('images/badge-coin.png') }}">80</a>
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