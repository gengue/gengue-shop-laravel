<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdmin
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
        if (\Auth::check()) {
            if(!\Auth::user()->is_admin) {
                return redirect('/')->with('msg', 'Debes ser administrador para entrar en esta seccion');
            }
        } else {
            return redirect('/login')->with('msg', 'Debes iniciar sesion como administrador para entrar en esta seccion');
        }

        return $next($request);
    }
}
