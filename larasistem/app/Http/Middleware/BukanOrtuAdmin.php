<?php

namespace SIAStar\Http\Middleware;

use Closure;
use Auth;

class BukanOrtuAdmin
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
        $role = Auth::user()->role;
        if($role!="siswa" && $role!="guru")
        {
            return response(null,'403');
        }
        return $next($request);
    }
}
