<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       
        if(!session('user_id')){
            return response()->view('auth.form');
        };

        $user_id = session('user_id');
        $user = User::find($user_id);
        // dd($user);
        if ($user && $user->role === 'admin') {
            return $next($request);
        }

        return response()->view('errors.notfound');
    }
}
