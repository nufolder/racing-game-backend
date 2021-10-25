@extends('layouts.app-user')

@section('content')
<link rel="stylesheet" href="{{ asset('minigames/memorygame.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<div class="container pt-3 bg-red memory-game">
        <div class="col-md-12">
        <div class="p-3">
            <img src="{{ asset('images/logo-generasi-juara.png') }}" class="img-fluid">
            <h1 class="text-center mt-3 text-white">
                <!-- <a href="" data-bs-toggle="modal" data-bs-target="#memorygameid"> -->
                    Uji Memori Kamu
                <!-- </a> -->
            </h1>
        </div>

        <div id="game"></div>

        </div>
</div>

<!-- Modal -->
<div class="modal fade" id="memorygameid" tabindex="-1" aria-labelledby="myModal" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable justify-content-center">
        <div class="modal-content">
            <div class="modal-body">
                <!-- <button type="button" onclick="resetGame();" data-bs-dismiss="modal"><img src="{{ asset('images/ico-close.png') }}"></button> -->
                <h5 class="modal-title modaltitlememorygame" id="exampleModalLabel">Selesai!</h5>
                <p class="textfinishmemorygame"></p>
            </div>
            <div id="memorygameredirect">
            </div>
        </div>
    </div>
</div>

<div class="modal fade memory-game" id="modalMatch" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered justify-content-center">
        <div class="modal-content">
            <div class="modal-body">
                <div class="notes">Kamu berhasil mencocokkan</div>
                <div class="nama" id="exampleModalLabel"></div>
                <div class="kelas" id="exampleModalLabel1"></div>
                <button type="button" class="ico-close" data-bs-dismiss="modal" aria-label="Close"><img src="{{ asset('images/ico-close.png') }}"></button>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('minigames/memorygame.js') }}"></script>

@endsection
