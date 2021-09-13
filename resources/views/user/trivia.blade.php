@extends('layouts.app')

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
                            <!-- creating a modal for when quiz ends -->
                            {{-- <div class="modal-container" id="score-modal">
                                <div class="modal-content-container">
                                    <h1>Congratulations</h1>
                                    <div class="grade-details">
                                        <p>Wrong Answers : <span id="wrong-answers"></span></p>
                                        <p>Right Answers : <span id="right-answers"></span></p>
                                        <p class="textfinishtrivia"></p>
                                    </div>
                                    <div class="modal-button-container">
                                        <button onclick="closeScoreModal()">Continue</button>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="modal fade" id="score-modal" tabindex="-1" aria-labelledby="myModal"
                                aria-hidden="true">
                                <div class="modal-dialog">
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
                                        <input type="radio" id="option-one" name="option" class="radio"
                                            value="optionA" />
                                        <label for="option-one" class="option" id="option-one-label"></label>
                                    </span>


                                    <span>
                                        <input type="radio" id="option-two" name="option" class="radio"
                                            value="optionB" />
                                        <label for="option-two" class="option" id="option-two-label"></label>
                                    </span>

                                    <span>
                                        <input type="radio" id="option-three" name="option" class="radio"
                                            value="optionC" />
                                        <label for="option-three" class="option" id="option-three-label"></label>
                                    </span>


                                    <span>
                                        <input type="radio" id="option-four" name="option" class="radio"
                                            value="optionD" />
                                        <label for="option-four" class="option" id="option-four-label"></label>
                                    </span>
                                </div>

                                {{-- <div class="col-12"> --}}
                                <div class="next-button-container">
                                    <button onclick="handleNextQuestion()">Next Question</button>
                                </div>
                                {{-- </div> --}}


                            </div>
                        </main>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('minigames/trivia.js') }}"></script>
</body>
@endsection