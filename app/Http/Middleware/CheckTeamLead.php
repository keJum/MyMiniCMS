<?php

namespace App\Http\Middleware;

use Closure;

class CheckTeamLead
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
        if ($request->user()->hasRole('Team lead'))
        return $next($request);
        else
        return back()->withInput();
    }
}
