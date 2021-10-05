@extends('layouts.app-user')

@section('title')
<title>Tambah Heal</title>
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
    <h1 class="text-center">Tambah Nyawa</h1>
    <div class="container  ">
        <div class="item">

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
        <div class="item">

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
        <div class="item">
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
        <div class="item">
            <div class="card h-100 text-dark bg-light mb-3">
                <div class="card-body">
                    <h5 class="card-title text-center">Share</h5>
                    <small>Share event ke facebook atau twitter, akan mendapatkan 1
                        Heal !
                    </small>
                    <div class="d-grid gap-2 pt-2">
                        <a id="shareBtn" class="btn btn-sm btn-success">
                            Share Facebook
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ url('/') }}" target="_blank"
                            class="btn btn-sm btn-success">
                            Share twitter
                        </a>
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