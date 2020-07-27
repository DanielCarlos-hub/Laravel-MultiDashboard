<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            switch (Auth::user()->role_id) {

                case 4:
                    return redirect()->route('administrador.home');
                    break;

                case 3:
                    return redirect()->route('diretor.home');
                    break;

                case 2:
                    return redirect()->route('professor.home');
                    break;

                case 1:
                    return redirect()->route('aluno.home');
                    break;

                default:
                return redirect()->route('home');
            }
        }

        return $next($request);
    }
}
