<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Race;

class UserController extends Controller
{

    public function index()
    {
        $user = User::with('race')->find(Auth::id());
        $leaderboard = Race::with('user')->orderBy('ticket', 'desc')->limit(5)->get();
        $week_win = Race::with('user.chanceToPlayRacing')
            ->where('weekly_winner', "on")
            ->orderBy('ticket', 'desc')
            ->limit(10)
            ->get();
        $last_rider = $user->race->last_rider;

        // dd($week_win);

        return view('user.home', compact('user', 'last_rider', 'leaderboard','week_win'));
    }
}
