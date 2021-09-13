@extends('layouts.app')

@section('content')

<div class="container p-3 bg-white">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body text-center">
                    <div class="pb-2">
                        <h4 class="text-center">
                            Profil
                        </h4>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="">
                                        <h5 class="text-center"><i class="fa fa-user" aria-hidden="true"></i>
                                            {{ $user->name }} </h5>
                                    </div>
                                    <span class=" badge bg-secondary">
                                        <i class="fa fa-ticket" aria-hidden="true"></i> Tiket:
                                        {{ number_format($user->race->ticket, 0) }}
                                    </span>
                                    <span class=" badge bg-secondary">
                                        <i class="fa fa-heartbeat" aria-hidden="true"></i> Heal:
                                        {{ number_format($user->race->heal, 0) }}
                                    </span>
                                    <span class=" badge bg-secondary">
                                        <i class="fa fa-gg-circle" aria-hidden="true"></i> Koin:
                                        {{ number_format($user->race->coin, 0) }}
                                    </span>

                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card">
                                <div class="card-body">
                                    <a href="" class="btn btn-sm btn-outline-primary ">
                                        <i class="fa fa-trophy" aria-hidden="true"></i> Leaderboard
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <div class="pb-2">
                        <a href="{{ url('race', $last_rider) }}" class="btn btn-sm btn-primary text-capitalize">
                            Play {{ $last_rider }} <i class="fa fa-play" aria-hidden="true"></i>
                        </a>
                        <span>
                            <a href="{{ url('add-heal') }}" class="btn btn-sm btn-primary">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i> Heal
                            </a>
                        </span>
                    </div>
                    <div class="pb-2">
                        Atau
                    </div>
                    <div>
                        <a href="{{ url('rider') }}" class="btn btn-lg btn-primary">
                            Pilih Riders <i class="fa fa-list" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection