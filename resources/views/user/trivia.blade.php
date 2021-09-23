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
                                <div class="next-button-container mt-3">
                                    <button onclick="handleNextQuestion()">Next Question</button>
                                </div>
                                {{-- </div> --}}
                            </div>

                            <p style="align-content: center; justify-content: center" class="mt-5">
                                Bingung??? Klik Disini untuk mendapatkan Petunjuk!
                                <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal"> Show Clue
                                </button>
                            </p>
                        </main>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Clue Jawaban</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="content-list">
                        <div class="table-responsive">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Ganti Foto Pegawai</h4>
                              </div>
                              <div class="modal-body">
                                <iframe frameborder="0" width="100%" scrolling="no" id="iframe"></iframe>
                              </div>
                              <div class="modal-footer">
                                {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}}
                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#exampleModal').on('shown.bs.modal', function () {
            $(this).find('iframe').href('src','#clue-link-label')
        })
    </script>
    <script src="{{ asset('minigames/trivia.js') }}"></script>
</body>
@endsection
