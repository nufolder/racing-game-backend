@extends('layouts.app')

@section('content')

<div>
    <div class="pt-5 rounded">
        <h5>
            Nama :{{ $user->name }}
            <br>
            Role: {{ $user->role }}
        </h5>
    </div>
</div>

@endsection