<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Race;

class UnlockClassController extends Controller
{
    public function unlock($class)
    {
        $race = Race::where('user_id', Auth::user()->id)->first();
        switch ($class) {
            case 'ttc':
                if ($race->coin >= 20) {

                    $checkRacer = json_decode($race->character);
                    $found = false;
                    foreach ($checkRacer as $v) {
                        if ($v->racer == 'chessy') {
                            $found = true;
                        }
                    }

                    if ($found) {
                        $message = 'Kelas TTC telah di unlock sebelumnya !!';
                    } else {
                        $arrayRacer = json_decode($race->character);
                        array_push(
                            $arrayRacer,
                            [
                                'racer'         => 'chessy',
                                'coin_value'    => 1,
                                'score_value'   => 400,
                                'hills'         => 'assets/assets-ttc/background_hills.png',
                                'sky'           => 'assets/assets-ttc/background_sky.png',
                                'trees'         => 'assets/assets-ttc/background_trees.png',
                                'left'          => 'assets/assets-ttc/car_left.png',
                                'right'         => 'assets/assets-ttc/car_right.png',
                                'straight'      => 'assets/assets-ttc/car_straight.png',
                                'up_left'       => 'assets/assets-ttc/car_up_left.png',
                                'up_right'      => 'assets/assets-ttc/car_up_right.png',
                                'up_straight'   => 'assets/assets-ttc/car_up_straight.png',
                            ],
                            [
                                'racer'         => 'veda',
                                'coin_value'    => 1,
                                'score_value'   => 400,
                                'hills'         => 'assets/assets-ttc/background_hills.png',
                                'sky'           => 'assets/assets-ttc/background_sky.png',
                                'trees'         => 'assets/assets-ttc/background_trees.png',
                                'left'          => 'assets/assets-ttc/car_left.png',
                                'right'         => 'assets/assets-ttc/car_right.png',
                                'straight'      => 'assets/assets-ttc/car_straight.png',
                                'up_left'       => 'assets/assets-ttc/car_up_left.png',
                                'up_right'      => 'assets/assets-ttc/car_up_right.png',
                                'up_straight'   => 'assets/assets-ttc/car_up_straight.png',
                            ]
                        );
                        $coinLeft = $race->coin - 20;
                        $race->update(
                            [
                                'coin' => $coinLeft,
                                'character' => $arrayRacer,
                            ]
                        );
                        $message = 'Kelas TTC telah di unlock !!';
                    }
                } else {
                    $message = 'Coin Anda Tidak Cukup';
                }
                break;

            case 'atc':
                if ($race->coin >= 40) {

                    $checkRacer = json_decode($race->character);
                    $found = false;
                    foreach ($checkRacer as $v) {
                        if ($v->racer == 'fadillah') {
                            $found = true;
                        }
                    }

                    if ($found) {
                        $message = 'Kelas ATC telah di unlock sebelumnya !!';
                    } else {
                        $arrayRacer = json_decode($race->character);
                        array_push(
                            $arrayRacer,
                            [
                                'racer'         => 'fadillah',
                                'coin_value'    => 1,
                                'score_value'   => 300,
                                'hills'         => 'assets/assets-atc/background_hills.png',
                                'sky'           => 'assets/assets-atc/background_sky.png',
                                'trees'         => 'assets/assets-atc/background_trees.png',
                                'left'          => 'assets/assets-atc/car_left.png',
                                'right'         => 'assets/assets-atc/car_right.png',
                                'straight'      => 'assets/assets-atc/car_straight.png',
                                'up_left'       => 'assets/assets-atc/car_up_left.png',
                                'up_right'      => 'assets/assets-atc/car_up_right.png',
                                'up_straight'   => 'assets/assets-atc/car_up_straight.png',
                            ],
                            [
                                'racer'         => 'azryan',
                                'coin_value'    => 1,
                                'score_value'   => 300,
                                'hills'         => 'assets/assets-atc/background_hills.png',
                                'sky'           => 'assets/assets-atc/background_sky.png',
                                'trees'         => 'assets/assets-atc/background_trees.png',
                                'left'          => 'assets/assets-atc/car_left.png',
                                'right'         => 'assets/assets-atc/car_right.png',
                                'straight'      => 'assets/assets-atc/car_straight.png',
                                'up_left'       => 'assets/assets-atc/car_up_left.png',
                                'up_right'      => 'assets/assets-atc/car_up_right.png',
                                'up_straight'   => 'assets/assets-atc/car_up_straight.png',
                            ],
                            [
                                'racer'         => 'herlian',
                                'coin_value'    => 1,
                                'score_value'   => 300,
                                'hills'         => 'assets/assets-atc/background_hills.png',
                                'sky'           => 'assets/assets-atc/background_sky.png',
                                'trees'         => 'assets/assets-atc/background_trees.png',
                                'left'          => 'assets/assets-atc/car_left.png',
                                'right'         => 'assets/assets-atc/car_right.png',
                                'straight'      => 'assets/assets-atc/car_straight.png',
                                'up_left'       => 'assets/assets-atc/car_up_left.png',
                                'up_right'      => 'assets/assets-atc/car_up_right.png',
                                'up_straight'   => 'assets/assets-atc/car_up_straight.png',
                            ],
                            [
                                'racer'         => 'herjun',
                                'coin_value'    => 1,
                                'score_value'   => 300,
                                'hills'         => 'assets/assets-atc/background_hills.png',
                                'sky'           => 'assets/assets-atc/background_sky.png',
                                'trees'         => 'assets/assets-atc/background_trees.png',
                                'left'          => 'assets/assets-atc/car_left.png',
                                'right'         => 'assets/assets-atc/car_right.png',
                                'straight'      => 'assets/assets-atc/car_straight.png',
                                'up_left'       => 'assets/assets-atc/car_up_left.png',
                                'up_right'      => 'assets/assets-atc/car_up_right.png',
                                'up_straight'   => 'assets/assets-atc/car_up_straight.png',
                            ]
                        );
                        $coinLeft = $race->coin - 20;
                        $race->update(
                            [
                                'coin' => $coinLeft,
                                'character' => $arrayRacer,
                            ]
                        );
                        $message = 'Kelas ATC telah di unlock !!';
                    }
                } else {
                    $message = 'Coin Anda Tidak Cukup';
                }
                break;

            case 'arrc':
                if ($race->coin >= 60) {

                    $checkRacer = json_decode($race->character);
                    $found = false;
                    foreach ($checkRacer as $v) {
                        if ($v->racer == 'adenanta') {
                            $found = true;
                        }
                    }

                    if ($found) {
                        $message = 'Kelas ARRC telah di unlock sebelumnya !!';
                    } else {
                        $arrayRacer = json_decode($race->character);
                        array_push(
                            $arrayRacer,
                            [
                                'racer'         => 'adenanta',
                                'coin_value'    => 1,
                                'score_value'   => 200,
                                'hills'         => 'assets/assets-arrc/background_hills.png',
                                'sky'           => 'assets/assets-arrc/background_sky.png',
                                'trees'         => 'assets/assets-arrc/background_trees.png',
                                'left'          => 'assets/assets-arrc/car_left.png',
                                'right'         => 'assets/assets-arrc/car_right.png',
                                'straight'      => 'assets/assets-arrc/car_straight.png',
                                'up_left'       => 'assets/assets-arrc/car_up_left.png',
                                'up_right'      => 'assets/assets-arrc/car_up_right.png',
                                'up_straight'   => 'assets/assets-arrc/car_up_straight.png',
                            ],
                            [
                                'racer'         => 'lucky',
                                'coin_value'    => 1,
                                'score_value'   => 200,
                                'hills'         => 'assets/assets-arrc/background_hills.png',
                                'sky'           => 'assets/assets-arrc/background_sky.png',
                                'trees'         => 'assets/assets-arrc/background_trees.png',
                                'left'          => 'assets/assets-arrc/car_left.png',
                                'right'         => 'assets/assets-arrc/car_right.png',
                                'straight'      => 'assets/assets-arrc/car_straight.png',
                                'up_left'       => 'assets/assets-arrc/car_up_left.png',
                                'up_right'      => 'assets/assets-arrc/car_up_right.png',
                                'up_straight'   => 'assets/assets-arrc/car_up_straight.png',
                            ],
                            [
                                'racer'         => 'irfan',
                                'coin_value'    => 1,
                                'score_value'   => 200,
                                'hills'         => 'assets/assets-arrc/background_hills.png',
                                'sky'           => 'assets/assets-arrc/background_sky.png',
                                'trees'         => 'assets/assets-arrc/background_trees.png',
                                'left'          => 'assets/assets-arrc/car_left.png',
                                'right'         => 'assets/assets-arrc/car_right.png',
                                'straight'      => 'assets/assets-arrc/car_straight.png',
                                'up_left'       => 'assets/assets-arrc/car_up_left.png',
                                'up_right'      => 'assets/assets-arrc/car_up_right.png',
                                'up_straight'   => 'assets/assets-arrc/car_up_straight.png',
                            ],
                            [
                                'racer'         => 'rheza',
                                'coin_value'    => 1,
                                'score_value'   => 200,
                                'hills'         => 'assets/assets-arrc/background_hills.png',
                                'sky'           => 'assets/assets-arrc/background_sky.png',
                                'trees'         => 'assets/assets-arrc/background_trees.png',
                                'left'          => 'assets/assets-arrc/car_left.png',
                                'right'         => 'assets/assets-arrc/car_right.png',
                                'straight'      => 'assets/assets-arrc/car_straight.png',
                                'up_left'       => 'assets/assets-arrc/car_up_left.png',
                                'up_right'      => 'assets/assets-arrc/car_up_right.png',
                                'up_straight'   => 'assets/assets-arrc/car_up_straight.png',
                            ]
                        );
                        $coinLeft = $race->coin - 60;
                        $race->update(
                            [
                                'coin' => $coinLeft,
                                'character' => $arrayRacer,
                            ]
                        );
                        $message = 'Kelas ARRC telah di unlock !!';
                    }
                } else {
                    $message = 'Coin Anda Tidak Cukup';
                }
                break;

            case 'cev':
                if ($race->coin >= 80) {

                    $checkRacer = json_decode($race->character);
                    $found = false;
                    foreach ($checkRacer as $v) {
                        if ($v->racer == 'mario') {
                            $found = true;
                        }
                    }

                    if ($found) {
                        $message = 'Kelas CEV telah di unlock sebelumnya !!';
                    } else {
                        $arrayRacer = json_decode($race->character);
                        array_push(
                            $arrayRacer,
                            [
                                'racer'         => 'mario',
                                'coin_value'    => 1,
                                'score_value'   => 100,
                                'hills'         => 'assets/assets-cev/background_hills.png',
                                'sky'           => 'assets/assets-cev/background_sky.png',
                                'trees'         => 'assets/assets-cev/background_trees.png',
                                'left'          => 'assets/assets-cev/car_left.png',
                                'right'         => 'assets/assets-cev/car_right.png',
                                'straight'      => 'assets/assets-cev/car_straight.png',
                                'up_left'       => 'assets/assets-cev/car_up_left.png',
                                'up_right'      => 'assets/assets-cev/car_up_right.png',
                                'up_straight'   => 'assets/assets-cev/car_up_straight.png',
                            ]
                        );
                        $coinLeft = $race->coin - 80;
                        $race->update(
                            [
                                'coin' => $coinLeft,
                                'character' => $arrayRacer,
                            ]
                        );
                        $message = 'Kelas CEV telah di unlock !!';
                    }
                } else {
                    $message = 'Coin Anda Tidak Cukup';
                }
                break;

            default:
                # code...
                break;
        }
        session()->flash('message', $message);
        return back()->with(['message', $message]);
    }
}
