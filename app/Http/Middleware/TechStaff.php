<?php

namespace App\Http\Middleware;

use Closure;

class TechStaff
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
        if(auth()->user()->user_type == 'techstaff'){
            return $next($request);
        }
        return redirect('home')->with('error','You dont have access to this page');
    }
}
