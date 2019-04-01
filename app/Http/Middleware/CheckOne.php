<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class CheckOne
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = User::find(Auth::id());
        if ( preg_match( '/1/' , $user->role->access ) ){
            return $next($request);
        }
        return redirect()->back();
    }
}
