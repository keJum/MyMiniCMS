<?php

namespace App\Http\Middleware;

use Closure;

class CheckTester
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
        if ($request->user()->hasRole('Tester'))
        return $next($request);
        else
        return back()->withInput();
    }
}
