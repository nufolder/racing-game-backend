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
                $message = 'Heal anda tidak mencukupi !';
                session()->flash('message', $message);
                return back()->with(['message', $message]);
            }
        } else {
            $message = 'Anda belum memiliki rider ' . $rider . ' !';
            session()->flash('message', $message);
            return back()->with(['message', $message]);
        }
    }
}
