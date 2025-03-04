<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()->is_admin == 1){
            return $next($request);
        }
        elseif (auth()->user()->is_admin == 2)
        {
            return $next($request);
        }
        elseif (auth()->user()->is_admin == 3)
        {
            return $next($request);
        }
        elseif (auth()->user()->is_admin == 0)
        {
            return $next($request);
        }

        alert()->warning('WarningAlert',"You don't have access");
        return redirect()->back();

    }
}
