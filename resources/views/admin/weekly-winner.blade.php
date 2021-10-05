@extends('layouts.app-admin')

@section('title')
<title>Admin</title>
@endsection

<style>
    td {
        font-size: 13px;
    }
</style>

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
                                            <button onclick="generator()" class="btn btn-primary btn-block btn-large">
                                                Generate Weekly Winner!

                                                <div id="loading" style="display: none">
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
                                                        Winner is
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="table-responsive">
                            <table class="table table-responsive table-sm table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Ticket</th>
                                        <th scope="col">Coin</th>
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


<script>
    let load = document.getElementById("loading");

    function generator() {
        const winner = @json($namearr);

        load.style.display = "block";
        
        setTimeout(() => {
            document.getElementById("name").innerHTML = winner[Math.floor(Math.random() * winner.length)];
            const htmlLoding = document.getElementById("loading");
            
            load.style.display = "none";
            
        }, 2000);

    }
</script>

@endsection