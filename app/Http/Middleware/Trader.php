<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Trader
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!auth()->check()){
            return redirect()->route('login');
        }
        if(auth()->user()->role != 1){
            return abort(401);
        }
        return $next($request);
    }
}
