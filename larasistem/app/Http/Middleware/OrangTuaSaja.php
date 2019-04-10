<?php

namespace SIAStar\Http\Middleware;

use Closure;
use Auth;
class OrangTuaSaja
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
        if(Auth::user()->role!="ortu")
        {
            return response(null,'403');
        }
        return $next($request);
    }
}
