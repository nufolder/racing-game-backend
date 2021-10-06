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
                    <div class="pb-2">
                        <h4 class="text-center">
                            Users Top 50
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
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($top50 as $key =>$value)
                                    <tr>
                                        <td scope="row">{{ $key + 1 }}</td>
                                        <td>{{ $value->user->name }}</td>
                                        <td>{{ $value->user->email }}</td>
                                        <td>{{ $value->ticket }}</td>
                                        <td>{{ $value->coin }}</td>
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