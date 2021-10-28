@extends('layouts.app-user')

@section('title')
<title>Video</title>
@endsection

@section('content')

<!-- Modal -->
<div class="modal fade modal-video" id="myModal" tabindex="-1" aria-labelledby="myModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Selamat !!</h5>
                <button type="button" class="ico-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="textfinishvideo"></p>
            </div>
            <div id="videoredirect" class="modal-footer">
            </div>
        </div>
    </div>
</div>


<div class="container pt-3 bg-red ">
    <div class="col-md-12">
        <div class="p-3">
            <img src="{{ asset('images/logo-generasi-juara.png') }}" class="img-fluid">
            <h1 class="text-center mt-3 text-white">
                Video
            </h1>
        </div>

        <div class="d-flex justify-content-center embed-responsive embed-responsive-16by9 mb-5">
            <div id="player"></div>
        </div>

    </div>
    <div class="pb-4">
        <center><img src="{{ asset('images/logo-ahrt.png') }}" class="img-logo-bottom"></center>
    </div>
</div>



@endsection