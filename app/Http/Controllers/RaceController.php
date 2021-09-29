<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Race;

class RaceController extends Controller
{
    function searchRacer($val, $array)
    {
        foreach ($array as $element) {
            if ($element['racer'] == $val) {
                return $element;
            }
        }
        return null;
    }

    public function rider()
    {
        $race = Race::where('user_id', Auth::user()->id)->first();
        $checkRacer = json_decode($race->character);
        $ttc    = false;
        $atc    = false;
        $arrc   = false;
        $cev    = false;
        foreach ($checkRacer as $v) {
            if ($v->racer == 'chessy') {
                $ttc = true;
            }
            if ($v->racer == 'fadillah') {
                $atc = true;
            }
            if ($v->racer == 'adenanta') {
                $arrc = true;
            }
            if ($v->racer == 'mario') {
                $cev = true;
            }
        }
        return view('user.rider', compact('ttc', 'atc', 'arrc', 'cev'));
    }

    public function raceRider($rider)
    {
        $race = Race::where('user_id', Auth::user()->id)->first();

        $character = json_decode($race->character, true);
        $uses_rider = $this->searchRacer($rider, $character);
        // $coin_value = $uses_rider['coin_value'];

        if ($uses_rider != null) {
            if ($race->heal != 0) {
                $race->update(
                    [
                        'last_rider' => $rider,
                    ]
                );
                return view('user.race-rider', compact('uses_rider'));
            } else {
                $message = 'Heal anda 0 !';
                session()->flash('message', $message);
                return back()->with(['message', $message]);
            }
        } else {
            $message = 'Anda belum memiliki rider ' . $rider . ' !';
            session()->flash('message', $message);
            return back()->with(['message', $message]);
        }
    }

    public function startGameCheck()
    {
        $race = Race::where('user_id', Auth::user()->id)->first();

        if ($race->heal != 0) {
            $min = $race->heal - 1;
            $race->update(
                [
                    'heal' => $min,
                ]
            );
            return response()->json(['response' => 'heal - 1', 'status' => 'ok']);
        } else {
            $redirect = url('user');
            $message = 'Heal anda 0 !';
            session()->flash('message', $message);
            return response()->json(['response' => $redirect, 'status' => 'no', 'message' => $message]);
        }
    }

    public function endGameCheck($get_ticket, $get_coin)
    {
        $race = Race::where('user_id', Auth::user()->id)->first();
        $plusticket = $get_ticket / 3000;
        if ($plusticket < 1) {
            $result_ticket = 0;
        } else {
            $result_ticket = $plusticket;
        }

        $check_ticket   = $race->ticket;
        $check_coin     = $race->coin;

        $sum_ticket     = $check_ticket + $result_ticket;
        $sum_coin       = $check_coin + $get_coin;
        $summary_play   = $race->summary_play + 1;

        $race->update(
            [
                'ticket'        => $sum_ticket,
                'coin'          => $sum_coin,
                'summary_play'  => $summary_play,
            ]
        );
        return response()->json(['response' => 'end game']);
    }
}
