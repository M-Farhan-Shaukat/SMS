<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class EnsureUserHasRole
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
        if(Auth::check()){
            if(Auth::user()->role == 1){
                return $next($request);
            }
            else{
                return redirect('/')->with('status','Access Denied,As You Are Not An Admin');
            }
        }
        else{
            return redirect()->back()->with('status','Pleace Login First');

        }

    }

}
