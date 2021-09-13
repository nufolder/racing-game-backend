<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $role = Auth::user()->role;
        if ($role == "admin") {
            return redirect()->to('admin');
        } else if ($role == "user") {
            return redirect()->to('user');
        } else {
            return redirect()->to('logout');
        }
    }
}
