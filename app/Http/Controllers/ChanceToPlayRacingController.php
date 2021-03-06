<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\ChanceToPlayRacing;
use App\Race;

class ChanceToPlayRacingController extends Controller
{


    public function addHealPage()
    {
        $checkT = ChanceToPlayRacing::where('user_id', Auth::user()->id)
            ->where('type', 'trivia')->first();
        if ($checkT->last_date == null || $checkT->last_date != \Carbon\Carbon::now()->format('Y-m-d')) {
            $statusT = true;
        } else {
            $statusT = false;
        }

        $checkM = ChanceToPlayRacing::where('user_id', Auth::user()->id)
            ->where('type', 'memorygame')->first();
        if ($checkM->last_date == null || $checkM->last_date != \Carbon\Carbon::now()->format('Y-m-d')) {
            $statusM = true;
        } else {
            $statusM = false;
        }

        $checkV = ChanceToPlayRacing::where('user_id', Auth::user()->id)
            ->where('type', 'video')->first();
        if ($checkV->last_date == null || $checkV->last_date != \Carbon\Carbon::now()->format('Y-m-d')) {
            $statusV = true;
        } else {
            $statusV = false;
        }

        $checkS = ChanceToPlayRacing::where('user_id', Auth::user()->id)
            ->where('type', 'share')->first();
        if ($checkS->last_date == null || $checkS->last_date != \Carbon\Carbon::now()->format('Y-m-d')) {
            $statusS = true;
        } else {
            $statusS = false;
        }

        return view('user.add-heal', compact('statusT', 'statusM', 'statusV', 'statusS'));
    }


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
            return response()->json(
                [
                    'response' => 'Kamu Mendapatkan 1 Nyawa !!',
                    'status' => 1
                ]
            );
        } else {
            return response()->json(
                [
                    'response' => 'Tapi kamu telah memainkan game Memory hari ini, dan tidak mendapatkan Nyawa',
                    'status' => 0
                ]
            );
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
            return response()->json(
                [
                    'response' => 'Kamu Mendapatkan 1 Nyawa !!',
                    'status' => 1
                ]
            );
        } else {
            return response()->json(
                [
                    'response' => 'Kamu Telah Memainkan Game ini, Hari ini!!',
                    'status' => 0
                ]
            );
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

            return response()->json(
                [
                    'response' => 'Kamu Mendapatkan 1 Nyawa !!',
                    'status' => 1
                ]
            );
        } else {
            return response()->json(
                [
                    'response' => 'Kamu Telah Menonton Video ini, Hari ini!!',
                    'status' => 0
                ]
            );
        }
    }

    public function shareSosmed()
    {
        $check = ChanceToPlayRacing::where('user_id', Auth::user()->id)
            ->where('type', 'share')->first();
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
            return response()->json(
                [
                    'response' => 'Kamu Mendapatkan 1 Nyawa !!',
                    'status' => 1
                ]
            );
        } else {
            return response()->json(
                [
                    'response' => 'Kamu share game ini, Hari ini!!',
                    'status' => 0
                ]
            );
        }
    }
}
