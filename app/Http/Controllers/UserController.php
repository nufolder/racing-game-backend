<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{

    public function index()
    {
        $user = User::with('race')->find(Auth::id());
        $last_rider = $user->race->last_rider;

        return view('user.home', compact('user', 'last_rider'));
    }
}
