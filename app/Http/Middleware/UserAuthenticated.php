<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthenticated
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
        if(Auth::check())
        {
            if (Auth::user()->id == $request->user_id){
                return $next($request);
            }else{
                return redirect(route('404page'));
            }
        }else{
            return redirect(route('customer.login.get'));
        }
        abort(404);  // for other user throw 404 error
    }
}
