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

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {

    Route::middleware(['admin'])->group(function () {
        Route::get('admin', 'AdminController@index');
    });

    Route::middleware(['user'])->group(function () {

        Route::get('user', 'UserController@index');

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
    });

    Route::get('logout', function () {
        Auth::logout();
        redirect('/');
    });
});
