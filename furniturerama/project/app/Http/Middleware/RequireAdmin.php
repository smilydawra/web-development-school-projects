<?php

namespace App\Http\Middleware;

use Closure;
use \Auth;

class RequireAdmin
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
        if(Auth::user()&&Auth::user()->admin){

            return $next($request);
        }

        return redirect('/')->with('error', 'You are not authorized to view that resource.');
        //return $next($request);
    }
}
