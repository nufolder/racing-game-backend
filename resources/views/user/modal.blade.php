<div class="modal fade modal-leaderboard" !important;" id="exampleModal" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-title">Leaderboard</div>

                <div class="content-list">
                    <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="all-tab" data-bs-toggle="tab" href="#all" role="tab"
                                aria-controls="all" aria-selected="true">Global Leader</a>
                        </li>
                        {{-- <li class="nav-item" role="presentation">
                            <a class="nav-link" id="weekly-tab" data-bs-toggle="tab" href="#weekly" role="tab"
                                aria-controls="weekly" aria-selected="false">Weekly Leader</a>
                        </li> --}}
                        {{-- <li class="nav-item" role="presentation">
                            <a class="nav-link" id="weekly-tab" data-bs-toggle="tab" href="#weekly-winner" role="tab"
                                aria-controls="weekly" aria-selected="false">Weekly Winners</a>
                        </li> --}}
                    </ul>

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                            <div class="table-responsive table-sm mt-2">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="co" width="50" style="text-align: center;">#</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Tiket</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($leaderboard as $key => $value)
                                        <tr>
                                            <td width="2%" class="text-center">{{ $key + 1 }}</td>
                                            <td width="10%" class="text-left">
                                                <b>{{ $value->user->name }}</b>
                                            </td>
                                            <td width="10%" class="text-left">
                                                <b>{{ $value->ticket }}</b>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="weekly" role="tabpanel" aria-labelledby="weekly-tab">
                            <div class="mt-3 mb-3" style="text-align: center;">
                            </div>
                            <div class="table-responsive">
                                <div id="showWWW">

                                </div>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="co" width="50" style="text-align: center;">#</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Tiket Weekly</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($week_win as $key => $value)
                                        <tr>
                                            <td width="2%" class="text-center">{{ $key + 1 }}</td>
                                            <td width="10%" class="text-left">
                                                <b>{{ $value->user->name }}</b>
                                            </td>
                                            <td width="10%" class="text-left">
                                                <b>{{ $value->score_weekly ?? '0'}}</b>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="weekly-winner" role="tabpanel" aria-labelledby="weekly-tab">
                            <div class="mt-3 mb-3" style="text-align: center;">
                                {{-- (tanggal - tanggal) --}}
                            </div>
                            <div class="table-responsive">
                                <div id="showWWW">

                                </div>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="co" width="50" style="text-align: center;">#</th>
                                            <th scope="col">Nama</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td width="2%" class="text-center">1</td>
                                            <td width="10%" class="text-left">
                                                <b>Rizky Maulana</b>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="2%" class="text-center">2</td>
                                            <td width="10%" class="text-left">
                                                <b>Satria AF Kamil</b>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="2%" class="text-center">3</td>
                                            <td width="10%" class="text-left">
                                                <b>Benediktus Sebastian Hutauruk</b>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="2%" class="text-center">3</td>
                                            <td width="10%" class="text-left">
                                                <b>Muhammad Riza Nurhadi</b>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-2">
                    <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">TUTUP</button>
                </div>
            </div>
        </div>
    </div>
</div>