<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class EnsureTeacher
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
            if(Auth::user()->role == 2){
                return $next($request);
            }
            else{
                return redirect('/')->with('status','Access Denied,As You Are Not A Teacher');
            }
        }
        else{
            return redirect()->back()->with('status','Pleace Login First');

        }

    }

}
