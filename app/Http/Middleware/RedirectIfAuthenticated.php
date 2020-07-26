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
            switch (Auth::user()->role->slug) {

                case 'administrador':
                    return redirect('/admin/home');
                    break;

                case 'diretor':
                    return redirect('/diretor/home');
                    break;

                case 'professor':
                    return redirect('/professor/home');
                    break;

                case 'aluno':
                    return redirect('/aluno/home');
                    break;

                default:
                    return redirect('/');
            }
        }

        return $next($request);
    }
}
