<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\ChanceToPlayRacing;
use App\Race;

class ChanceToPlayRacingController extends Controller
{
    public function getMemoryGame()
    {
        $check = ChanceToPlayRacing::where('user_id', Auth::user()->id)
            ->where('type', 'memorygame')->first();
        if ($check->last_date == null || $check->last_date != \Carbon\Carbon::now()->format('Y-m-d')) {
            $check->update(
                [
                    'last_date' => \Carbon\Carbon::now()->format('Y-m-d'),
                    'summary_count' => $check->summary_count + 1
                ]
            );
            $race = Race::where('user_id', Auth::user()->id)->first();
            $race->update(
                [
                    'heal' => $race->heal + 1
                ]
            );
            return response()->json(['response' => 'Kamu Mendapatkan 1 Game!!']);
        } else {
            return response()->json(['response' => 'Kamu Telah Memainkan Game ini, Hari ini!!']);
        }
    }

    public function getTrivia()
    {
        $check = ChanceToPlayRacing::where('user_id', Auth::user()->id)
            ->where('type', 'trivia')->first();
        if ($check->last_date == null || $check->last_date != \Carbon\Carbon::now()->format('Y-m-d')) {
            $check->update(
                [
                    'last_date' => \Carbon\Carbon::now()->format('Y-m-d'),
                    'summary_count' => $check->summary_count + 1
                ]
            );
            $race = Race::where('user_id', Auth::user()->id)->first();
            $race->update(
                [
                    'heal' => $race->heal + 1
                ]
            );
            return response()->json(['response' => 'Kamu Mendapatkan 1 Game!!']);
        } else {
            return response()->json(['response' => 'Kamu Telah Memainkan Game ini, Hari ini!!']);
        }
    }

    public function getVideo()
    {
        $check = ChanceToPlayRacing::where('user_id', Auth::user()->id)
            ->where('type', 'video')->first();
        if ($check->last_date == null || $check->last_date != \Carbon\Carbon::now()->format('Y-m-d')) {
            $check->update(
                [
                    'last_date' => \Carbon\Carbon::now()->format('Y-m-d'),
                    'summary_count' => $check->summary_count + 1
                ]
            );
            $race = Race::where('user_id', Auth::user()->id)->first();
            $race->update(
                [
                    'heal' => $race->heal + 1
                ]
            );
            return response()->json(['response' => 'Kamu Mendapatkan 1 Game!!']);
        } else {
            return response()->json(['response' => 'Kamu Telah Menonton Video ini, Hari ini!!']);
        }
    }
}
