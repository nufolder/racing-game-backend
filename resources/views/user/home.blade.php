@extends('layouts.app-user')

@section('title')
<title>Profile</title>
@endsection

@section('content')

<!-- <nav class="navbar navbar-expand-lg navbar-light bg-light" aria-label="Ninth navbar example">
    <div class="container col-md-7">
        <a class="navbar-brand" href="{{ url('home') }}">Amazing Race</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample07XL"
            aria-controls="navbarsExample07XL" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample07XL">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle active" href="#" id="dropdownMenu2" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Logout <i class="fas fa-sign-out-alt"></i> </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
 -->
<div class="container p-3 bg-red mw-600 dashboard pb-5">
    <div class="">
        <div class="badge-area d-flex">
            <span class=" badge">                
                <img src="{{ asset('images/badge-life.png') }}" class="medium-badge">{{ number_format($user->race->heal, 0) }} Nyawa 
                <a href="{{ url('add-heal') }}"><img src="{{ asset('images/badge-addlife.png') }}" class="medium-badge-right"></a>
            </span>
            <span class=" badge ms-auto">
                <img src="{{ asset('images/badge-coin.png') }}" class="small-badge">{{ number_format($user->race->coin, 0) }}
            </span>
            <span class=" badge">
                <img src="{{ asset('images/badge-ticket.png') }}" class="small-badge">{{ number_format($user->race->ticket, 0) }}
            </span>
        </div>
        <center><img src="{{ asset('images/logo-generasi-juara.png') }}" class="img-fluid py-4 mt-3"></center>
            @if (session('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            <div class="">
                <div class="text-center">

                    <h1 class="text-center">
                        <!-- Halo {{ $user->name }}! -->
                        Halo  {{ Auth::user()->name }}
                    </h1>

                    <div class="rider-image">
                        <div class="photo"><img src="{{ asset('images/riders/'.$last_rider.'.png') }}"></div>
                        <div class="name">{{ $last_rider }}</div>
                    </div>
                    
                    <a href="{{ url('race', $last_rider) }}" class="btn btn-red btn-big">START RACE</a>

                    <div class="container px-5">
                        <button type="button" class="btn btn-grey mt-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="fa fa-trophy" aria-hidden="true"></i> Leader board
                        </button>

                        <a href="{{ url('rider') }}" class="btn mt-2">
                            Pilih Riders <i class="fa fa-list" aria-hidden="true"></i>
                        </a>

                        <div class="mt-5">
                            <a class="btn btn-small" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> SIGN OUT <i class="fa fa-sign-out"></i> </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
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
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                              <a class="nav-link active" id="all-tab" data-bs-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="true">All</a>
                            </li>
                            <li class="nav-item" role="presentation">
                              <a class="nav-link" id="weekly-tab" data-bs-toggle="tab" href="#weekly" role="tab" aria-controls="weekly" aria-selected="false">Weekly Leader</a>
                            </li>
                        </ul>

                          <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
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

                            <div class="tab-pane fade" id="weekly" role="tabpanel" aria-labelledby="weekly-tab">
                                <div class="mt-3 mb-3" style="text-align: center;">
                                    (tanggal - tanggal)
                                </div>
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
                                            @foreach($week_win as $key => $value)
                                            <tr>
                                                <td width="2%" class="text-center">{{ $key + 1 }}</td>
                                                <td width="10%" class="text-left">
                                                    <b>{{ $value->user->name }}</b>
                                                </td>
                                                <td width="10%" class="text-left">
                                                    <b>{{ $value->score_weekly ?? '0'}}</b>
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
    </div>

</div>

@endsection
