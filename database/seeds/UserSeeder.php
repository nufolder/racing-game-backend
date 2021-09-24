<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\ChanceToPlayRacing;
use App\Race;

class UserSeeder extends Seeder
{
    public function run()
    {
        $admin                      = new User;
        $admin->name                = 'Admin';
        $admin->email               = 'admin@gmail.com';
        $admin->password            = Hash::make('admin123');
        $admin->google_id           = null;
        $admin->motor_cycle         = 'CBR 150';
        $admin->year_motor_cycle    = '2017';
        $admin->role                = 'admin';
        $admin->created_at          = \Carbon\Carbon::now();
        $admin->email_verified_at   = \Carbon\Carbon::now();
        $admin->save();

        $race                   = new Race;
        $race->user_id          = $admin->id;
        $race->coin             = 0;
        $race->ticket           = 0;
        $race->heal             = 300;
        $race->summary_play     = 0;
        $race->character        = json_encode(
            [
                [
                    'racer'         => 'default',
                    'coin_value'    => 1,
                    'score_value'   => 500,
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

        $admin_trivia                  = new ChanceToPlayRacing;
        $admin_trivia->user_id         = $admin->id;
        $admin_trivia->type            = 'trivia';
        $admin_trivia->last_date       = null;
        $admin_trivia->summary_count   = null;
        $admin_trivia->save();

        $admin_memory_game                  = new ChanceToPlayRacing;
        $admin_memory_game->user_id         = $admin->id;
        $admin_memory_game->type            = 'memorygame';
        $admin_memory_game->last_date       = null;
        $admin_memory_game->summary_count   = null;
        $admin_memory_game->save();

        $admin_video                  = new ChanceToPlayRacing;
        $admin_video->user_id         = $admin->id;
        $admin_video->type            = 'video';
        $admin_video->last_date       = null;
        $admin_video->summary_count   = null;
        $admin_video->save();

        $admin_login                  = new ChanceToPlayRacing;
        $admin_login->user_id         = $admin->id;
        $admin_login->type            = 'login';
        $admin_login->last_date       = \Carbon\Carbon::now()->format('Y-m-d');;
        $admin_login->summary_count   = 1;
        $admin_login->save();

        $admin_share                  = new ChanceToPlayRacing;
        $admin_share->user_id         = $admin->id;
        $admin_share->type            = 'login';
        $admin_share->last_date       = null;
        $admin_share->summary_count   = null;
        $admin_share->save();

        //---------------------------------------------------------------

        $user                      = new User;
        $user->name                = 'User';
        $user->email               = 'user@gmail.com';
        $user->password            = Hash::make('user123');
        $user->google_id           = null;
        $user->motor_cycle         = 'CBR 150';
        $user->year_motor_cycle    = '2017';
        $user->role                = 'user';
        $user->created_at          = \Carbon\Carbon::now();
        $user->email_verified_at   = \Carbon\Carbon::now();
        $user->save();

        $raceuser                   = new Race;
        $raceuser->user_id          = $user->id;
        $raceuser->coin             = 0;
        $raceuser->ticket           = 0;
        $raceuser->heal             = 3;
        $raceuser->summary_play     = 0;
        $raceuser->character        = json_encode(
            [
                [
                    'racer'         => 'default',
                    'coin_value'    => 1,
                    'score_value'   => 500,
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
        $raceuser->last_rider       = 'default';
        $raceuser->save();

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
        $user_login->last_date       = \Carbon\Carbon::now()->format('Y-m-d');;
        $user_login->summary_count   = 1;
        $user_login->save();

        $user_share                  = new ChanceToPlayRacing;
        $user_share->user_id         = $user->id;
        $user_share->type            = 'share';
        $user_share->last_date       = null;
        $user_share->summary_count   = null;
        $user_share->save();
    }
}
