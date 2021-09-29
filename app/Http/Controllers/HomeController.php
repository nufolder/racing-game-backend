<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
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
