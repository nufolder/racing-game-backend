<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('google', 'GoogleController@redirect');
Route::get('google/callback', 'GoogleController@callback');
Route::get('kebijakan-privasi', function () {
    return view('user.privacy-policy');
});
Route::get('syarat-dan-ketentuan', function () {
    return view('user.syarat-ketentuan');
});
Route::get('aturan-permainan', function () {
    return view('user.aturan-permainan');
});

Route::middleware(['auth'])->group(function () {

    Route::get('home', 'HomeController@index')->name('home');

    Route::middleware(['admin'])->group(function () {
        Route::get('admin', 'Admin\AdminController@index')->name('admin');
        Route::get('admin/users', 'Admin\AdminController@users')->name('admin.users');
        Route::get('admin/edit-user/{id}', 'Admin\AdminController@editUser')->name('admin.usersedit');
        Route::post('admin/update-user/{id}', 'Admin\AdminController@updateUser')->name('admin.usersupdate');
        Route::get('admin/weekly-winner', 'Admin\AdminController@weeklyWinner')->name('admin.weeklywinner');
        Route::post('admin/reset-weekly-winner', 'Admin\AdminController@resetWeeklyWinner')->name('admin.resetweeklywinner');
        Route::get('admin/minigames', 'Admin\AdminController@minigames')->name('admin.minigames');
        Route::get('admin/race', 'Admin\AdminController@race')->name('admin.race');
        Route::get('admin/top50', 'Admin\AdminController@top50')->name('admin.top50');
        Route::get('admin/grand-winner', 'Admin\AdminController@grandWinner')->name('admin.grandwinner');
    });

    Route::middleware(['user'])->group(function () {

        Route::get('user', 'UserController@index')->name('admin');

        Route::get('check-heal', 'RaceController@checkHeal');
        Route::get('rider', 'RaceController@rider');
        Route::get('race/{rider}', 'RaceController@raceRider');
        Route::get('start-game-check', 'RaceController@startGameCheck');
        Route::get('end-game-check/{get_ticket}/{get_coin}', 'RaceController@endGameCheck');

        Route::get('unlock/class/{class}', 'UnlockClassController@unlock');

        Route::get('add-heal', 'ChanceToPlayRacingController@addHealPage');

        Route::get('memory-game', function () {
            return view('user.memory-game');
        });
        Route::get('get-memory-game', 'ChanceToPlayRacingController@getMemoryGame');

        Route::get('trivia', function () {
            return view('user.trivia');
        });
        Route::get('get-trivia', 'ChanceToPlayRacingController@getTrivia');

        Route::get('video', function () {
            return view('user.video');
        });
        Route::get('get-video', 'ChanceToPlayRacingController@getVideo');

        Route::get('get-share', 'ChanceToPlayRacingController@shareSosmed');
    });

    Route::get('logout', function () {
        Auth::logout();
        redirect('/');
    });
});
