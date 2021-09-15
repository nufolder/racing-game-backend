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
                                        <small>Cari Persamaan, akan mendapatkan 1 Heal !</small>
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
                            <a href="{{ url('video') }}">
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
                            <div class="card h-100 text-dark bg-light mb-3">
                                <div class="card-body">
                                    <h5 class="card-title text-center">Share</h5>
                                    <small>Share event ke facebook atau twitter, akan mendapatkan 1
                                        Heal !
                                    </small>
                                    {{-- <div class="fb-share-button" data-href="https://racing.nufolder.xyz/"
                                        data-layout="button_count" data-size="small">
                                        <a target="_blank"
                                            href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse"
                                            class="fb-xfbml-parse-ignore">
                                            Bagikan
                                        </a>
                                    </div> --}}
                                    <div id="shareBtn" class="btn btn-success clearfix">Share Facebook</div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="shareid" tabindex="-1" aria-labelledby="shareid" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="textfinishshare">Congratulations</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="textfinishshare"></p>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('shareBtn').onclick = function() {
        FB.ui({
            method: 'share',
            href: '{{ url("/") }}',
            },
            function(response) {
                if (response && !response.error_message) {
                    $.ajax({
                    method: 'GET',
                    crossDomain: true,
                    crossOrigin: true,
                    async: true,
                    contentType: 'application/json',
                    url: "/get-share",
                    success: function(resp) {
                        console.log("Respond was: ", resp)
                        $('.modaltitleshare').text('Selamat !!');
                        $('.textfinishshare').text(resp.response);
                        var shareModal = new bootstrap.Modal(document.getElementById('shareid'), {
                        keyboard: false
                        });
                        shareModal.show();
                    },
                    error: function(request, status, error) {
                        console.log("Respond was: ", resp);
                        $('.modaltitleshare').text(resp.response);
                        }
                    });
                } else {
                alert('Error while posting.');
                }
        });
    }
</script>

@endsection