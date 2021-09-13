@extends('layouts.app')

@section('content')

<div class="container pt-3 bg-white">

    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            @if (session('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <div class="pb-2">
                        <h4 class="text-center">
                            Pilih Rider
                        </h4>
                    </div>


                    <div class="row">
                        <div class="col-6">

                            @if ($ttc == false)
                            <div class="card text-white bg-secondary mb-3">
                                <div class="card-header text-center">TTC 20 Koin</div>
                                <div class="card-body">
                                    <p class="card-text text-center small">
                                        Rider kelas "Thailand Talent Cup"
                                    </p>
                                </div>
                                <div class="card-footer text-center bg-transparent border-light">
                                    <a href="{{ url('unlock/class/ttc') }}" class="btn btn-sm btn-block btn-light">Beli
                                        Rider
                                    </a>
                                </div>
                            </div>
                            @else
                            <div class="card text-white bg-primary mb-3">
                                <div class="card-header text-center">TTC</div>
                                <div class="card-body">
                                    <p class="card-text text-center small">
                                        Rider kelas "Thailand Talent Cup"
                                    </p>
                                </div>
                                <div class="card-footer text-center bg-transparent border-light">
                                    <a class="btn btn-sm btn-block btn-light" data-bs-toggle="modal"
                                        data-bs-target="#ttc">
                                        <i class="fa fa-eye" aria-hidden="true"></i> Buka
                                    </a>
                                </div>
                            </div>
                            @endif

                        </div>
                        <div class="col-6">
                            @if ($atc == false)
                            <div class="card text-white bg-secondary mb-3">
                                <div class="card-header text-center">ATC 40 Koin</div>
                                <div class="card-body">
                                    <p class="card-text text-center small">
                                        Rider kelas "Asian Talent Cup"
                                    </p>
                                </div>
                                <div class="card-footer text-center bg-transparent border-light">
                                    <a href="{{ url('unlock/class/atc') }}" class="btn btn-sm btn-block btn-light">Beli
                                        Rider</a>
                                </div>
                            </div>
                            @else
                            <div class="card text-white bg-primary mb-3">
                                <div class="card-header text-center">ATC</div>
                                <div class="card-body">
                                    <p class="card-text text-center small">
                                        Rider kelas "Asian Talent Cup"
                                    </p>
                                </div>
                                <div class="card-footer text-center bg-transparent border-light">
                                    <a class="btn btn-sm btn-block btn-light" data-bs-toggle="modal"
                                        data-bs-target="#atc"><i class="fa fa-eye" aria-hidden="true"></i> Buka
                                    </a>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="col-6">
                            @if ($arrc == false)
                            <div class="card h-100 text-white bg-secondary mb-3">
                                <div class="card-header text-center">ARRC 60 Koin</div>
                                <div class="card-body">
                                    <p class="card-text text-center small">
                                        Rider kelas "Asia Road Racing Championship"
                                    </p>
                                </div>
                                <div class="card-footer text-center bg-transparent border-light">
                                    <a href="{{ url('unlock/class/arrc') }}" class="btn btn-sm btn-block btn-light">Beli
                                        Rider</a>
                                </div>
                            </div>
                            @else
                            <div class="card h-100 text-white bg-primary mb-3">
                                <div class="card-header text-center">ARRC</div>
                                <div class="card-body">
                                    <p class="card-text text-center small">
                                        Rider kelas "Asia Road Racing Championship"
                                    </p>
                                </div>
                                <div class="card-footer text-center bg-transparent border-light">
                                    <a class="btn btn-sm btn-block btn-light" data-bs-toggle="modal"
                                        data-bs-target="#arrc"><i class="fa fa-eye" aria-hidden="true"></i> Buka
                                    </a>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="col-6">
                            @if ($cev == false)
                            <div class="card h-100 text-white bg-secondary mb-3">
                                <div class="card-header text-center">CEV 80 Koin</div>
                                <div class="card-body">
                                    <p class="card-text text-center small">
                                        Rider di kelas "Junior Moto3 CEV"
                                    </p>
                                </div>
                                <div class="card-footer text-center bg-transparent border-light">
                                    <a href="{{ url('unlock/class/cev') }}" class="btn btn-sm btn-block btn-light">Beli
                                        Rider</a>
                                </div>
                            </div>
                            @else <div class="card h-100 text-white bg-primary mb-3">
                                <div class="card-header text-center">CEV</div>
                                <div class="card-body">
                                    <p class="card-text text-center small">
                                        Rider di kelas "Junior Moto3 CEV"
                                    </p>
                                </div>
                                <div class="card-footer text-center bg-transparent border-light">
                                    <a class="btn btn-sm btn-block btn-light" data-bs-toggle="modal"
                                        data-bs-target="#asd"><i class="fa fa-eye" aria-hidden="true"></i> Buka
                                    </a>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @include('user.modal-pick-riders')


</div>

@endsection