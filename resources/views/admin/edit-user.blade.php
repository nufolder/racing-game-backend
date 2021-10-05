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

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @if ($errors->has('email'))
                @endif
            </div>
            @endif
            <div class="card">
                <div class="card-body ">
                    <div class="pb-2">
                        <h4 class="text-center">
                            Edit User
                            <hr>
                        </h4>

                        <form method="POST" action="{{ url('admin/update-user/'. $user->id) }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            Name
                                        </label>
                                        <input type="text" class="form-control form-control-sm" name="name"
                                            value="{{ $user->name }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            Email
                                        </label>
                                        <input type="email" class="form-control form-control-sm" name="email"
                                            value="{{ $user->email}}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            Weekly Winner
                                        </label>
                                        <select class="form-select" name="weekly_winner"
                                            aria-label="Default select example">
                                            <option {{ $user->race->weekly_winner == "on" ? "selected" : "" }}
                                                value="on">
                                                on
                                            </option>
                                            <option {{ $user->race->weekly_winner == "off" ? "selected" : "" }}
                                                value="off">
                                                off
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            Coin
                                        </label>
                                        <input type="text" class="form-control form-control-sm" name="coin"
                                            value="{{ $user->race->coin }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            Ticket
                                        </label>
                                        <input type="text" class="form-control form-control-sm" name="ticket"
                                            value="{{ $user->race->ticket }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            Heal
                                        </label>
                                        <input type="text" class="form-control form-control-sm" name="heal"
                                            value="{{ $user->race->heal }}">
                                    </div>
                                </div>
                            </div>
                            <div style="text-align:end;">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection