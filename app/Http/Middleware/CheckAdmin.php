<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User;
class CheckAdmin
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
        // dd($request->user()->hasRole('Admin'));
        // $user = User::find(Auth::id());
        // if ($user->role == 'Admin') 
        
        if ($request->user()->hasRole('Admin'))
        return $next($request);
        else
        return back()->withInput();
    }
}
