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

                    <div class="section d-flex justify-content-center embed-responsive embed-responsive-16by9">
                        <video style="max-width:100%; height:auto" id="myVideo" controls="true"
                            class="embed-responsive-item">
                            <source src="{{ asset('minigames/YukSemangat.mp4') }}" type="video/mp4">
                            Your browser does not support playing this Video
                        </video>
                    </div>

                    <script type='text/javascript'>
                        document.getElementById('myVideo').addEventListener('ended',myHandler,false);
                            function myHandler(e) {
                                console.log(e);
                                console.log("Video Finish !!");
                                $.ajax({
                                method: 'GET',
                                crossDomain: true,
                                crossOrigin: true,
                                async: true,
                                
                                url: "/get-video",
                                success: function(resp) {
                                console.log("Respond was: ", resp);
                                var myModal = new bootstrap.Modal(document.getElementById('myModal'), {
                                keyboard: false
                                });

                                myModal.show();
                                $('.textfinishvideo').text(resp.response);
                                if (resp.status == 1) {
                                document.getElementById('videoredirect').innerHTML = `<a href="user" type="button" class="btn btn-secondary">Oke</a>`;
                                } else {
                                document.getElementById('videoredirect').innerHTML = `<a type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Oke</a>`;
                                }
                                },
                                error: function(request, status, error) {
                                console.log("Respond was: ", resp);
                                var myModal = new bootstrap.Modal(document.getElementById('myModal'), {
                                keyboard: false
                                });
                                myModal.show();
                                $('.textfinishvideo').text(resp.response);
                                }
                                });
                            }
                    </script>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Selamat !!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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

@endsection