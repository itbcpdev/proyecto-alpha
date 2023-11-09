<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class userAuthenticated
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
        if (!Auth::check()) {
            return redirect()->route('customer.home')->with('fail', 'Es necesario iniciar sessión o realizar una prueba');
        }
        if (Auth::check()) {
            if ($request->path() == 'login') {
                return redirect()->route('customer.home');
            }
            if (Auth::user()->update_profile == 0 && ($request->path() != 'subscription') && ($request->path() != 'looks/recomendacion') && ($request->path() != 'logoutCustomer')) {
                return redirect('/subscription')->with('fail', 'Es necesario completar esta información');
            }
        }
        return $next($request);
    }
}
