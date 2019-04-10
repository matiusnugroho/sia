<?php

namespace SIAStar\Http\Middleware;

use Closure;
use Auth;

class AksesRekapNilai
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    private $tolakAkses =['guru'=>['create','edit'],'siswa'=>['*']];
    public function handle($request, Closure $next)
    {
        $role = Auth::user()->role;
        $ok = array_has($this->tolakAkses,'guru.create');
        return dd($ok);
        return $next($request);
    }
}
