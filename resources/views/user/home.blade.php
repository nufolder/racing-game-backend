@extends('layouts.app')

@section('content')

<div class="container p-3">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <center><img src="{{ asset('images/logo-smol.png') }}" class="w-50"></center>
            @if (session('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="card dashboard">
                <div class="card-body text-center">
                    <div class="pb-2">
                    </div>
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="">
                                        <h1 class="text-center">
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                            {{ $user->name }} 
                                        </h1>
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
                            <div class="card">
                                <div class="card-body">
                                    <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        <i class="fa fa-trophy" aria-hidden="true"></i> Leaderboard
                                    </button>
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




    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Leaderboard</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="content-list">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="co" width="50" style="text-align: center;">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Ticket</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($leaderboard as $key => $value)
                                    <tr>
                                        <td width="2%" class="text-center">{{ $key + 1 }}</td>
                                        <td width="10%" class="text-left">
                                            <b>{{ $value->user->name }}</b>
                                        </td>
                                        <td width="10%" class="text-left">
                                            <b>{{ $value->ticket }}</b>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection