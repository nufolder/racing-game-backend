@extends('layouts.app-user')
@section('title')
<title>Trivia</title>
@endsection

@section('content')

<link rel="stylesheet" href="{{ asset('minigames/trivia.css') }}">

<body onload="NextQuestion(0)">
    <div class="container pt-3 bg-red">
        <div class="col-md-12">
            <div class="p-3">
                <img src="{{ asset('images/logo-generasi-juara.png') }}" class="img-fluid">
                <h1 class="text-center mt-3 text-white">
                    Trivia
                </h1>
            </div>
            <main>
                <div class="modal fade closemodal" id="score-modal" tabindex="-1" aria-labelledby="myModal"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title modaltitletrivia" id="exampleModalLabel"></h5>
                                <button type="button" onclick="closeScoreModal()" class="btn-close"
                                    data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <small>Jawaban yang salah: <span id="wrong-answers"></span></small>
                                <small>Jawaban yang benar: <span id="right-answers"></span></small>
                                <p class="textfinishtrivia"></p>
                            </div>
                            <div id="triviaredirect" class="modal-footer">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">

                    <div class="col-md-6 mb-3 text-center">
                        <div class="d-inline p-2 bg-dark rounded-pill text-white" style="margin-right:12px;">
                            Skor : <span id="player-score"></span> / 5
                        </div>
                        <div class="d-inline p-2 bg-dark rounded-pill text-white">
                            Pertanyaan ke : <span id="question-number"></span> / 5
                        </div>

                    </div>

                    <div class="game-question-container">
                        <h6 id="display-question"></h6>
                    </div>

                    <div class="game-options-container">

                        <div class="col-md-12 text-center pt-2" id="option-modal">

                            <div class="">
                                <h5 style="padding: 12px;color:white;">Pilih Jawaban kamu</h5>
                                {{-- <hr> --}}
                            </div>

                        </div>
                        <span>
                            <input type="radio" id="option-one" name="option" class="radio" value="optionA"
                                onclick="handleNextQuestion()" />
                            <label for="option-one" class="option" id="option-one-label"></label>
                        </span>


                        <span>
                            <input type="radio" id="option-two" name="option" class="radio" value="optionB"
                                onclick="handleNextQuestion()" />
                            <label for="option-two" class="option" id="option-two-label"></label>
                        </span>

                        <span>
                            <input type="radio" id="option-three" name="option" class="radio" value="optionC"
                                onclick="handleNextQuestion()" />
                            <label for="option-three" class="option" id="option-three-label"></label>
                        </span>


                        <span>
                            <input type="radio" id="option-four" name="option" class="radio" value="optionD"
                                onclick="handleNextQuestion()" />
                            <label for="option-four" class="option" id="option-four-label"></label>
                        </span>
                    </div>

                    {{-- <div class="next-button-container mt-3">
                                    <button onclick="handleNextQuestion()">Next Question</button>
                                </div> --}}
                    <div class="col-md-6 mb-3 text-center mt-5">
                        <div class="text-white text-small">
                            Butuh Petunjuk? <a href="#" data-bs-toggle="modal" data-bs-target="#clueModal" style="color: white !important">Klik Disini</a>
                        </div>

                        {{-- <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#clueModal">
                            Klik Disini
                        </button> --}}
                    </div>
                </div>


            </main>
        </div>
    </div>

    {{-- modal --}}
    <div class="modal fade" id="clueModal" aria-labelledby="clueModalLabel" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-xl" role="document">

            {{-- modal content --}}
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title " id="exampleModalLabel">Clue Jawaban</h5>
                    {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button> --}}
                </div>
                <div class="modal-body">
                    <div id="clue-iframe-label"
                        style=" width: 100%; border: none; overflow-y: auto; overflow-x: hidden;" frameborder="0"
                        marginheight="0" marginwidth="0" height="100%" width="100%" scrolling="auto">
                    </div>
                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Tutup
                    </button> --}}
                </div>

            </div>

        </div>

    </div>
    <script src="{{ asset('minigames/trivia.js') }}"></script>
</body>
@endsection
