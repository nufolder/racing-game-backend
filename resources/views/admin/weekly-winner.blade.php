@extends('layouts.app-admin')

@section('title')
<title>Admin</title>
@endsection


@section('content')

<div class="container p-3 bg-white">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if (session('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="card">
                <div class="card-body text-center">
                    <div class="pb-4">
                        <h4 class="text-center">
                            Weekly Winner
                        </h4>

                        <div class="pb-2">
                            <div class="card">
                                <div class="card-body text-center">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button onclick="clickGenerate()"
                                                class="btn btn-primary btn-block btn-large">
                                                Click Generate Weekly Winner!

                                                <div id="loading" style="display: none">
                                                    Wait...
                                                    <div id="loading" class="spinner-border spinner-border-sm"
                                                        role="status">
                                                        <span class="visually-hidden">
                                                            Loading...
                                                        </span>
                                                    </div>
                                                </div>

                                            </button>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h6 class="jumbotron text-center" id="name">
                                                        <div class="spinner-grow text-secondary" role="status">
                                                            <span class="visually-hidden">Loading...</span>
                                                        </div>
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h4 class="mt-5">Top 10 yang akan di undi weekly winner</h4>

                        <div class="table-responsive">
                            <table class="table table-responsive table-sm table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col" style="text-align: center;">#</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Tiket</th>
                                        <th scope="col">Koin</th>
                                        <th scope="col">
                                            Score Weekly

                                            <button class="btn btn-sm btn-danger" onclick="resetScoreWeekly()">
                                                reset
                                            </button>
                                        </th>
                                        <th scope="col" style="text-align: center;" colspan="5">Activity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($week_win as $key =>$value)
                                    <tr>
                                        <td scope="row">{{ $key + 1 }}</td>
                                        <td>{{ $value->user->name }}</td>
                                        <td>{{ $value->user->email }}</td>
                                        <td>{{ $value->ticket }}</td>
                                        <td>{{ $value->coin }}</td>
                                        <td>{{ $value->score_weekly }}</td>
                                        @foreach ($value->user->chanceToPlayRacing as $key => $value)
                                        <td>
                                            <li
                                                class="list-group-item d-flex justify-content-between align-items-center">
                                                {{ $value->type }}
                                                <span class="badge bg-primary rounded-pill">
                                                    {{ $value->summary_count ? $value->summary_count: 0 }}
                                                </span>
                                            </li>
                                        </td>
                                        @endforeach
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

<div class="modal fade" id="resetscoreweekly" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reset Score Weekly</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-footer">
                <form action="{{ url('admin/reset-weekly-winner') }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-primary d-flex flex-grow-1">Reset Score</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="generateweeklywinner" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Generete Weekly Winner</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-footer">
                <button type="submit" onclick="generator()" class="btn btn-primary d-flex flex-grow-1"
                    data-bs-dismiss="modal">
                    Generate Weekly Winner
                </button>
            </div>
        </div>
    </div>
</div>


<script>
    function resetScoreWeekly() {
        const score = new bootstrap.Modal(document.getElementById('resetscoreweekly'), {
        keyboard: false
        })
        score.show()
    }

    let load = document.getElementById("loading");

    
    function clickGenerate() {
        const score = new bootstrap.Modal(document.getElementById('generateweeklywinner'), {
        keyboard: false
        });
        score.show()
    }

    function generator() {

        const winner = @json($namearr);

        load.style.display = "block";
        
        setTimeout(() => {
            document.getElementById("name").innerHTML = winner[Math.floor(Math.random() * winner.length)];
            
            load.style.display = "none";
            
        }, 4000);

    }
</script>

@endsection