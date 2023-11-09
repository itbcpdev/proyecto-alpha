<?php

namespace App\Http\Middleware;

use Closure;

class AuthCheck
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
        if (!session()->has('LoggedUser') && ($request->path() != 'admin/login')) {
            return redirect()->route('auth.login')->with('fail', 'Es necesario iniciar sessión');
        }

        if (session()->has('LoggedUser') && $request->path() == 'admin/login') {
            return redirect()->route('admin.usuarios.index');
        }
        return $next($request);
    }
}
