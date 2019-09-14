<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class checkAge
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$age)
    {
        //return redirect(route('adminLogin'));
        /*if (!(Auth::check())){
            return view('admin.home');
        }*/
        return $next($request);
    }
}
