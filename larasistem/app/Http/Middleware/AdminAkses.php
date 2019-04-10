<?php

namespace SIAStar\Http\Middleware;

use Closure;
use Auth;

class AdminAkses
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
        if(Auth::user()->role!="admin")
        {
            return response('403');
        }
        return $next($request);
    }
}
