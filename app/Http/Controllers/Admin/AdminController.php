<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\ChanceToPlayRacing;
use App\Race;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('admin.home', compact('user'));
    }

    public function users()
    {
        $users = User::orderBy('created_at', 'DESC')->with('race', 'chanceToPlayRacing')->paginate(20);

        return view('admin.users', compact('users'));
    }

    public function editUser(Request $request, $id)
    {
        $user = User::with('race')->find($id);
        // return $user;
        return view('admin.edit-user', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        // return $id;
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'weekly_winner' => 'required',
            'coin' => 'required|integer',
            'ticket' => 'required|integer',
            'heal' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::find($id);
        $user->name = $request->name;
        $user->save();

        $race = Race::find($user->id);
        $race->weekly_winner = $request->weekly_winner;
        $race->coin = $request->coin;
        $race->ticket = $request->ticket;
        $race->heal = $request->heal;
        $race->save();

        $message = "User telah di update!";
        session()->flash('message', $message);
        return redirect('admin/users')->with(['message' => $message]);
    }

    public function weeklyWinner()
    {
        $week_win = Race::with('user.chanceToPlayRacing')
            ->where('weekly_winner', "on")
            ->orderBy('score_weekly', 'desc')
            ->limit(10)
            ->get();

        foreach ($week_win as $key => $value) {
            $namearr[] =  $value->user->name;
        }

        return view('admin.weekly-winner', compact('week_win', 'namearr'));
    }

    public function grandWinner()
    {
        $top_five_ticket = Race::with('user.chanceToPlayRacing')
            ->where('user_id', '!=', 1335)
            ->where('user_id', '!=', 46)
            ->where('user_id', '!=', 33)
            ->orderBy('ticket', 'desc')
            ->limit(200)
            ->get();

        foreach ($top_five_ticket as $key => $value) {
            $toprr[] =  $value->user;
        }

        return view('admin.grand-winner', compact('top_five_ticket', 'toprr'));
    }

    public function resetWeeklyWinner()
    {
        $race = Race::orderBy('ticket', 'desc')->get();

        foreach ($race as $key => $value) {
            $value->score_weekly = null;
            $value->save();
        }
        $message = 'Score weekly has been reset!';
        session()->flash('message', $message);
        // return $message;
        return back()->with(['message', $message]);
    }

    public function minigames()
    {
        $trivia = ChanceToPlayRacing::orderBy('summary_count', 'DESC')
            ->where('type', 'trivia')
            ->get();
        $sumtrivia = $trivia->sum('summary_count');

        $memorygames = ChanceToPlayRacing::orderBy('summary_count', 'DESC')
            ->where('type', 'memorygame')
            ->get();
        $summemorygames = $memorygames->sum('summary_count');

        $video = ChanceToPlayRacing::orderBy('summary_count', 'DESC')
            ->where('type', 'video')
            ->get();
        $sumvideo = $video->sum('summary_count');

        $login = ChanceToPlayRacing::orderBy('summary_count', 'DESC')
            ->where('type', 'login')
            ->get();
        $sumlogin = $login->sum('summary_count');

        $share = ChanceToPlayRacing::orderBy('summary_count', 'DESC')
            ->where('type', 'share')
            ->get();
        $sumshare = $share->sum('summary_count');

        return view('admin.mini-games', compact(
            'sumtrivia',
            'summemorygames',
            'sumvideo',
            'sumlogin',
            'sumshare'
        ));
    }

    public function race()
    {
        $race = Race::orderBy('summary_play', 'DESC')->get();
        $sumrace = $race->sum('summary_play');
        return view('admin.race', compact('sumrace'));
    }

    public function top50()
    {
        $top50 = Race::with('user')->orderBy('ticket', 'desc')->limit(200)->get();
        return view('admin.top50', compact('top50'));
    }
}
