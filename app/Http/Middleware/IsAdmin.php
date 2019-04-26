<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param string[null] $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)

    {
        if(Auth('admin')->user())  
        {
            
             return $next($request);
        }
        
        return redirect( '/admin/login' );

    }
}
