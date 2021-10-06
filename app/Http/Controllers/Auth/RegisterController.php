<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\ChanceToPlayRacing;
use App\Race;
use GuzzleHttp\Client;

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

        $messages = [
            'name.required'         => 'Nama wajib diisi',
            'name.max'              => 'Nama maksimal 50 huruf',
            'name.min'              => 'Nama minimal 4 huruf',
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'email.unique'          => 'Email ini sudah aktif, pilih email lain',
            'email.max'             => 'Email maksimal 100',
            'password.required'     => 'Password wajib diisi',
            'password.min'          => 'Password minimal 8 karakter',
            'password.confirmed'    => 'Password tidak cocok'
        ];

        return Validator::make($data, [
            'name'              => ['required', 'max:50', 'min:4'],
            'email'             => ['required', 'email', 'max:100', 'unique:users'],
            'password'          => ['required', 'min:8', 'confirmed'],
            'motor_cycle'       => ['required'],
            'year_motor_cycle'  => ['required'],
        ], $messages);
    }

    public function register(Request $request)
    {
        if ($request->email) {
            $check_email = new Client();
            $res = $check_email->get('https://api.debounce.io/v1?api=5f51d3981735e&email=' . $request->email)->getBody();
            $res_decode = json_decode($res);
            $result_check = $res_decode->debounce->send_transactional;

            if ($result_check == '0') {
                $message = 'Email kamu tidak valid, periksa kembali email kamu!';
                session()->flash('message', $message);
                return back()->with(['message', $message]);
            }
        }

        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        // $message = 'Kamu mendapatkan 3 Nyawa !!';
        // session()->flash('message', $message);

        return $request->wantsJson()
            ? new JsonResponse([], 201)
            : redirect($this->redirectPath());
    }

    protected function create(array $data)
    {
        // dd($data['email']);
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
        $user_login->last_date       = \Carbon\Carbon::now()->format('Y-m-d');
        $user_login->summary_count   = 1;
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
