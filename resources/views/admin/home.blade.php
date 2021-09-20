@extends('layouts.app-admin')

@section('title')
<title>Admin</title>
@endsection

@section('content')

<div class="container p-3 bg-white">
    <div class="row justify-content-center">
        <div class="col-md-8">
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
                            Admin
                        </h4>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection