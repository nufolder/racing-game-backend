<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\ChanceToPlayRacing;
use Illuminate\Support\Facades\Auth;
use App\Race;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    function checkLogin()
    {
        $check = ChanceToPlayRacing::where('user_id', Auth::user()->id)
            ->where('type', 'login')->first();
        if ($check->last_date == null || $check->last_date != \Carbon\Carbon::now()->format('Y-m-d')) {
            $check->update(
                [
                    'last_date' => \Carbon\Carbon::now()->format('Y-m-d'),
                    'summary_count' => $check->summary_count + 1
                ]
            );
            $race = Race::where('user_id', Auth::user()->id)->first();
            $race->update(
                [
                    'heal' => 3
                ]
            );
            return 'Kamu Mendapatkan 3 Heal !!';
        } else {
            return '';
        }
    }

    public function login(Request $request)
    {
        $rules = [
            'email'                 => 'required|email',
            'password'              => 'required'
        ];

        $messages = [
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'password.required'     => 'Password wajib diisi'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $data = [
            'email'     => $request->input('email'),
            'password'  => $request->input('password'),
        ];

        Auth::attempt($data);

        if (Auth::check()) {
            $checkLogin =  $this->checkLogin();
            // $message = 'Kamu mendapatkan 3 Heal !!';
            session()->flash('message', $checkLogin);
            return redirect('home');
        } else {
            Session::flash('error', 'Email atau password salah');
            return redirect()->route('login');
        }
    }
}
