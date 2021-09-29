@extends('layouts.app-user')

@section('title')
<title>Video</title>
@endsection

@section('content')

<div class="container pt-3 bg-white">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="pb-2">
                        <h4 class="text-center">Video</h4>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModal" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Selamat !!</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p class="textfinishvideo"></p>
                                </div>
                                <div id="videoredirect" class="modal-footer">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="section d-flex justify-content-center embed-responsive embed-responsive-16by9">
                    <video style="max-width:100%; height:auto" id="myVideo" controls autoplay
                        class="embed-responsive-item">
                        <source type="video/mp4">
                        Your browser does not support playing this Video
                    </video>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection