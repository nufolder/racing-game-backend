@extends('layouts.app')

@section('content')

<div class="container pt-3 bg-white">

    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <div class="pb-2">
                        <h4 class="text-center">
                            Tambah Heal
                        </h4>
                    </div>
                    <div class="row ">
                        <div class="col-6 pb-4">

                            @if ($statusT == false)
                            <a class="disabled">
                                <div class="card h-100 text-dark bg-light mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title text-center">Trivia</h5>
                                        <small class="card-text">Jawab Pertanyaan, akan mendapatkan 1 Heal !</small>
                                    </div>
                                </div>
                            </a>
                            @else
                            <a href="{{ url('trivia') }}">
                                <div class="card h-100 text-white bg-primary mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title text-center">Trivia</h5>
                                        <small class="card-text">Jawab Pertanyaan, akan mendapatkan 1 Heal !</small>
                                    </div>
                                </div>
                            </a>
                            @endif

                        </div>
                        <div class="col-6 pb-4">

                            @if ($statusM == false)
                            <a class="disabled">
                                <div class="card h-100 text-dark bg-light mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title text-center">Memory Game</h5>
                                        <small>Cari Persamman, akan mendapatkan 1 Heal !</small>
                                    </div>
                                </div>
                            </a>
                            @else
                            <a href="{{ url('memory-game') }}">
                                <div class="card h-100 text-white bg-primary mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title text-center">Memory Game</h5>
                                        <small>Cari Persamman, akan mendapatkan 1 Heal !</small>
                                    </div>
                                </div>
                            </a>
                            @endif

                        </div>
                        <div class="col-6 pb-4">

                            @if ($statusV == false)
                            <a class="disable">
                                <div class="card h-100 text-dark bg-light mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title text-center">Video</h5>
                                        <small>Tonton video, akan mendapatkan 1 Heal !</small>
                                    </div>
                                </div>
                            </a>
                            @else
                            <a class="disable">
                                <div class="card h-100 text-white bg-primary mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title text-center">Video</h5>
                                        <small>Tonton video, akan mendapatkan 1 Heal !</small>
                                    </div>
                                </div>
                            </a>
                            @endif

                        </div>
                        <div class="col-6 pb-4">
                            <a href="">
                                <div class="card h-100 text-dark bg-light mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title text-center">Share</h5>
                                        <small>Share event ke facebook atau twitter, akan mendapatkan 1
                                            Heal !
                                        </small>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


</div>

@endsection