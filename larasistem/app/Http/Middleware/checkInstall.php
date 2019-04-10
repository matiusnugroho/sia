<?php

namespace SIAStar\Http\Middleware;

use Closure;

class checkInstall
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
        if(config('sia.install')==true) return redirect('install');
        return $next($request);
    }
}
