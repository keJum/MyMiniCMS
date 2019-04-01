<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Support\Facades\Auth;

class CheckTree
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
        $user = User::finc(Auth::id);
        if ( preg_match( '/3/', $user->role-access)){
            return $next($request);        
        }
        return redirect()->back();
    }
}
