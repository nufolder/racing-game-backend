@extends('layouts.app-user')

@section('title')
<title>Trivia</title>
@endsection

@section('content')

<link rel="stylesheet" href="{{ asset('minigames/trivia.css') }}">

<body onload="NextQuestion(0)">
    <div class="container pt-3 bg-white">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="pb-2">
                            <h4 class="text-center">Trivia</h4>
                        </div>
                        <main>

                            <div class="modal fade" id="score-modal" tabindex="-1" aria-labelledby="myModal"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title modaltitletrivia" id="exampleModalLabel">
                                                Congratulations</h5>
                                            <button type="button" onclick="closeScoreModal()" class="btn-close"
                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Jawaban yang salah: <span id="wrong-answers"></span></p>
                                            <p>Jawaban yang benar: <span id="right-answers"></span></p>
                                            <p class="textfinishtrivia"></p>
                                        </div>
                                        <div id="triviaredirect" class="modal-footer">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-center">

                                <div class="col-md-12">
                                    <h6>Score : <span id="player-score"></span> / 5</h6>
                                    <h6> Question : <span id="question-number"></span> / 5</h6>
                                </div>

                                <div class="game-question-container">
                                    <h6 id="display-question"></h6>
                                </div>

                                <div class="game-options-container">

                                    <div class="col-md-12 text-center pt-2" id="option-modal">

                                        <div class="">
                                            <h6>Please Pick An Option</h6>
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
                                        <input type="radio" id="option-three" name="option" class="radio"
                                            value="optionC" onclick="handleNextQuestion()" />
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
                            </div>

                            <p style="align-content: center; justify-content: center" class="mt-5">
                                Bingung??? Klik untuk mendapatkan Petunjuk!

                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#clueModal">
                                    Klik Disini
                                </button>
                            </p>
                        </main>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- modal --}}
    <div class="modal fade" id="clueModal" aria-labelledby="clueModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Clue Jawaban</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{-- <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/v64KOxKVLVg" allowfullscreen></iframe> --}}
                    {{-- <iframe
                        src="https://www.instagram.com/p/BcMQdQfAyN3/embed"
                        style="display: block;
                    width: 100%;
                    height:100%;
                    border: none;
                    overflow-y: auto;
                    overflow-x: hidden;" frameborder="0" marginheight="0" marginwidth="0" width="100%"
                        scrolling="auto">
                    </iframe> --}}

                    <div id="clue-iframe-label"
                        style="display: block; width: 100%; height: 100%; border: none; overflow-y: auto; overflow-x: hidden;"
                        frameborder="0" marginheight="0" marginwidth="0" width="100%" scrolling="auto">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('minigames/trivia.js') }}"></script>
</body>
@endsection