<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Leaderboard</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="content-list">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <a class="nav-link active" id="all-tab" data-bs-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="true">All</a>
                        </li>
                        <li class="nav-item" role="presentation">
                          <a class="nav-link" id="weekly-tab" data-bs-toggle="tab" href="#weekly" role="tab" aria-controls="weekly" aria-selected="false">Weekly Leader</a>
                        </li>
                    </ul>

                      <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="co" width="50" style="text-align: center;">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Ticket</th>
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
                                {{-- (tanggal - tanggal) --}}
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="co" width="50" style="text-align: center;">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Score Weekly</th>
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
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>
