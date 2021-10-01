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
                    <div class="pb-2">
                        <h4 class="text-center">
                            Weekly Winner
                        </h4>
                        <div class="table-responsive">
                            <table class="table table-responsive table-sm table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Ticket</th>
                                        <th scope="col">Coin</th>
                                        <th scope="col">Activity</th>
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
                                        {{-- <td>{{ $value->user->chanceToPlayRacing->email }}</td> --}}
                                        <td>
                                            <ul class="list-group">
                                                @foreach ($value->user->chanceToPlayRacing as $key => $value)
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-center">
                                                    {{ $value->type }}
                                                    <span class="badge bg-primary rounded-pill">
                                                        {{ $value->summary_count ? $value->summary_count: 0 }}
                                                    </span>
                                                </li>
                                                @endforeach
                                            </ul>
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