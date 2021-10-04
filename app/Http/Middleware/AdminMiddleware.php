<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::user()->role != "admin") {
            /* 
            silahkan modifikasi pada bagian ini
            apa yang ingin kamu lakukan jika rolenya tidak sesuai
            */
            abort(403);
        }
        return $next($request);
    }
}
