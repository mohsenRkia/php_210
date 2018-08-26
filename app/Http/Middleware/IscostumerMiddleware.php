<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class IscostumerMiddleware
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
        if (Auth::check() && Auth::user()->role_id === 0){
            return $next($request);
        }elseif (Auth::check() && Auth::user()->role_id === 1){
            return redirect()->route('admin.index');
        }
        else{
            return redirect()->route('home.index');
        }
    }
}
