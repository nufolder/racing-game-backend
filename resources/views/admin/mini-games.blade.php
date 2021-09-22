@extends('layouts.app-admin')

@section('title')
<title>Admin</title>
@endsection

@section('content')

<div class="container p-3 bg-white">
    <div class="row  justify-content-center">
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
                            Minigames
                        </h4>

                        {{-- <div class="d-flex justify-content-center"> --}}
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Trivia
                                <span class="badge bg-primary rounded-pill">{{ $sumtrivia }} x</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Memorygames
                                <span class="badge bg-primary rounded-pill">{{ $summemorygames }} x</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Video
                                <span class="badge bg-primary rounded-pill">{{ $sumvideo }} x</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Login
                                <span class="badge bg-primary rounded-pill">{{ $sumlogin }} x</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Share
                                <span class="badge bg-primary rounded-pill">{{ $sumshare }} x</span>
                            </li>
                        </ul>
                        {{-- </div> --}}

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection