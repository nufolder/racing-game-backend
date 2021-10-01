<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\ChanceToPlayRacing;
use App\Race;

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
        $user = User::with('race')->find($id);
        // return $user;
        return view('admin.edit-user', compact('user'));
    }

    public function weeklyWinner()
    {
        $week_win = Race::with('user.chanceToPlayRacing')
            ->where('weekly_winner', null)
            ->orderBy('ticket', 'desc')
            ->limit(10)
            ->get();
        // return $week_win;

        return view('admin.weekly-winner', compact('week_win'));
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
        $top50 = Race::with('user')->orderBy('ticket', 'desc')->limit(50)->get();
        return view('admin.top50', compact('top50'));
    }
}
