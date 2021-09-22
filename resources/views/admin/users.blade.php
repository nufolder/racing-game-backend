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
                            Users
                        </h4>
                        <div class="table-responsive">
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Motor</th>
                                        <th scope="col">Tahun Motor</th>
                                        <th scope="col">Register</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $key =>$value)
                                    <tr>
                                        <td scope="row">{{ $key + $users->firstItem() }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->email }}</td>
                                        <td>{{ $value->motor_cycle }}</td>
                                        <td>{{ $value->year_motor_cycle }}</td>
                                        <td>{{ $value->created_at }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $users->links() }}
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection