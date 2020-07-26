<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class DiretorMiddleware
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
            return redirect()->route('login');
        }

        if (Auth::user()->role->slug == 'diretor') {
            return $next($request);
        }

		$dashboards = [
            'aluno' => 'aluno',
            'professor' => 'professor',
            'administrador' => 'administrador'
        ];

		return redirect()->route($dashboards[Auth::user()->role->slug].'.home');

    }
}
