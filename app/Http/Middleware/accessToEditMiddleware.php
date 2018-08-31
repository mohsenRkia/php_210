<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class accessToEditMiddleware
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
        $id = (int)$request->route('id');

        if (Auth::check() && Auth::user()->id === $id){
            return $next($request);
        }else{
            return redirect()->route('profile.index');//
        }

    }
}
