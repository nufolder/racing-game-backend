@extends('layouts.app-user')

@section('content')
{{-- <script src="https://use.fontawesome.com/be9f755eb3.js"></script> --}}
<link rel="stylesheet" href="{{ asset('minigames/memorygame.css') }}">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<div class="container pt-3 bg-white">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="pb-2">
                        <h4 class="text-center">Memory Game</h4>
                    </div>

                    <div class="modal fade" id="memorygameid" tabindex="-1" aria-labelledby="myModal"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title modaltitlememorygame" id="exampleModalLabel">
                                        Congratulations</h5>
                                    <button type="button" onclick="resetGame();" class="btn-close"
                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p class="textfinishmemorygame"></p>
                                </div>
                                <div id="memorygameredirect" class="modal-footer">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="game"></div>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('minigames/memorygame.js') }}"></script>

@endsection