@extends('layouts.app-user')

@section('title')
<title>Tambah Nyawa</title>
@endsection

@section('content')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<div class="add-life">

    @if (session('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="p-3">
        <img src="{{ asset('images/logo-generasi-juara.png') }}" class="img-fluid">
    </div>
    <h1 class="text-center">Tambah Nyawa</h1>
    <div class="container bg-red pb-5">

        @if ($statusT == false)
        <div class="item disabled">
            <a href="" class="btn">
                @else
                <div class="item">
                    <a href="{{ url('trivia') }}" class="btn">
                        @endif
                        <div class="row">
                            <div class="col-4">
                                <img src="images/ico-trivia.png" class="img-fluid">
                            </div>
                            <div class="col-8 texting">
                                <h5 class="card-title text-center">TRIVIA</h5>
                                <p class="card-text">JAWAB TRIVIA DAN DAPATKAN NYAWA +1</p>
                            </div>
                        </div>
                    </a>
                </div>


                @if ($statusM == false)
                <div class="item disabled">
                    <a href="" class="btn">
                        @else
                        <div class="item">
                            <a href="{{ url('memory-game') }}" class="btn">
                                @endif
                                <div class="row">
                                    <div class="col-4">
                                        <img src="images/ico-game.png" class="img-fluid">
                                    </div>
                                    <div class="col-8 texting">
                                        <h5 class="card-title text-center">GAME</h5>
                                        <p class="card-text">UJI MEMORI KAMU DAN DAPATKAN NYAWA +1</p>

                                    </div>
                                </div>
                            </a>
                        </div>

                        @if ($statusV == false)
                        <div class="item disabled">
                            <a href="" class="btn">
                                @else
                                <div class="item">

                                    <a href="{{ url('video') }}" class="btn">
                                        @endif
                                        <div class="row">
                                            <div class="col-4">
                                                <img src="images/ico-video.png" class="img-fluid">
                                            </div>
                                            <div class="col-8 texting">
                                                <h5 class="card-title text-center">VIDEO</h5>
                                                <p class="card-text">TONTON VIDEO DAN DAPATKAN NYAWA +1</p>

                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="item">

                                    <div class="item-share">
                                        <div class="d-flex flex-wrap ">
                                            <div
                                                class="col-5 d-flex flex-wrap justify-content-between px-3 align-items-center">
                                                <a id="shareBtn"><img src="{{ asset('images/btn-facebook.png') }}"></a>
                                                <a href="https://twitter.com/intent/tweet?url={{ url('/') }}"
                                                    target="_blank"><img
                                                        src="{{ asset('images/btn-twitter.png') }}"></a>
                                            </div>
                                            <div class="col-7 texting">
                                                <p class="card-text text-center">bagikan melalui sosmed kamu DAN dapatkan nyawa +1</p>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <center><a href="{{ url('home') }}" class="btn w-50">HOME</a></center>
                                </div>

                        </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="shareid" tabindex="-1" aria-labelledby="shareid" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="textfinishshare">Congratulations</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p class="textfinishshare"></p>
                            </div>
                            <div id="shareredirect" class="modal-footer">
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    function runShare() {
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
                if (resp.status == 1) {
                document.getElementById('shareredirect').innerHTML = `<a href="user" type="button"
                    class="btn btn-secondary">Oke</a>`;
                } else {
                document.getElementById('shareredirect').innerHTML = `<a type="button" class="btn btn-secondary"
                    data-bs-dismiss="modal">Oke</a>`;
                }
                shareModal.show();
            },
            error: function(request, status, error) {
                console.log("Respond was: ", resp);
                $('.modaltitleshare').text(resp.response);
            }
        });
    }
                </script>

                <script>
                    document.getElementById('shareBtn').onclick = function() {
        FB.ui({
            method: 'share',
            href: '{{ url("/") }}',
            },
            function(response) {
                if (response && !response.error_message) {
                    runShare();
                } else {
                // alert('Error while posting.');
                }
        });
    }
                </script>

                <script>
                    function loguser(event) {
        if (event) {
            runShare();
        }
    }
    
    window.twttr = (function (d,s,id) {
    var t, js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return; js=d.createElement(s); js.id=id;
    js.src="//platform.twitter.com/widgets.js"; fjs.parentNode.insertBefore(js, fjs);
    return window.twttr || (t = { _e: [], ready: function(f){ t._e.push(f) } });
    }(document, "script", "twitter-wjs"));
    
    twttr.ready(function (twttr) {
    twttr.events.bind('tweet', loguser);
    });
                </script>

                @endsection