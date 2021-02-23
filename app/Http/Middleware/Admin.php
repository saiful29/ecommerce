<?php

namespace App\Http\Middleware;

use Closure;


use Illuminate\Support\Facades\Auth;

class Admin
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
        if(Auth::check())
        {
            if(Auth::user()->permission < 9)
            {
                //return redirect('home');
                return abort(403, 'Unauthorized action.');
            }
        }else
        {
            return abort(403, 'Unauthorized action.');
        }
        return $next($request);

    }
}
