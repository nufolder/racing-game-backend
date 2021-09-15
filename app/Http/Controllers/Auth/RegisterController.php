<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\ChanceToPlayRacing;
use App\Race;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'              => ['required', 'string', 'max:255'],
            'email'             => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'          => ['required', 'string', 'min:8', 'confirmed'],
            'motor_cycle'       => ['required'],
            'year_motor_cycle'  => ['required'],
        ]);
    }

    protected function create(array $data)
    {
        // dd($data);
        $user =  User::create([
            'name'              => $data['name'],
            'email'             => $data['email'],
            'password'          => Hash::make($data['password']),
            'google_id'         => null,
            'motor_cycle'       => $data['motor_cycle'],
            'year_motor_cycle'  => $data['year_motor_cycle'],
            'role'              => 'user',
        ]);

        $race                   = new Race;
        $race->user_id          = $user->id;
        $race->coin             = 0;
        $race->ticket           = 0;
        $race->heal             = 3;
        $race->summary_play     = 0;
        $race->character        = json_encode(
            [
                [
                    'racer'         => 'default',
                    'coin_value'    => 1,
                    'hills'         => 'assets/assets-default/background_hills.png',
                    'sky'           => 'assets/assets-default/background_sky.png',
                    'trees'         => 'assets/assets-default/background_trees.png',
                    'left'          => 'assets/assets-default/car_left.png',
                    'right'         => 'assets/assets-default/car_right.png',
                    'straight'      => 'assets/assets-default/car_straight.png',
                    'up_left'       => 'assets/assets-default/car_up_left.png',
                    'up_right'      => 'assets/assets-default/car_up_right.png',
                    'up_straight'   => 'assets/assets-default/car_up_straight.png',
                ]
            ]
        );
        $race->last_rider           = 'default';
        $race->save();

        $user_trivia                  = new ChanceToPlayRacing;
        $user_trivia->user_id         = $user->id;
        $user_trivia->type            = 'trivia';
        $user_trivia->last_date       = null;
        $user_trivia->summary_count   = null;
        $user_trivia->save();

        $user_memory_game                  = new ChanceToPlayRacing;
        $user_memory_game->user_id         = $user->id;
        $user_memory_game->type            = 'memorygame';
        $user_memory_game->last_date       = null;
        $user_memory_game->summary_count   = null;
        $user_memory_game->save();

        $user_video                  = new ChanceToPlayRacing;
        $user_video->user_id         = $user->id;
        $user_video->type            = 'video';
        $user_video->last_date       = null;
        $user_video->summary_count   = null;
        $user_video->save();

        $user_login                  = new ChanceToPlayRacing;
        $user_login->user_id         = $user->id;
        $user_login->type            = 'login';
        $user_login->last_date       = null;
        $user_login->summary_count   = null;
        $user_login->save();

        $user_share                  = new ChanceToPlayRacing;
        $user_share->user_id         = $user->id;
        $user_share->type            = 'share';
        $user_share->last_date       = null;
        $user_share->summary_count   = null;
        $user_share->save();

        return $user;
    }
}
