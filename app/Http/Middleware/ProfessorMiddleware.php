<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class ProfessorMiddleware
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

        if (Auth::user()->role->slug == 'professor') {
            return $next($request);
        }

		$dashboards = [
            'aluno' => 'aluno',
            'diretor' => 'diretor',
            'administrador' => 'administrador'
        ];

		return redirect()->route($dashboards[Auth::user()->role->slug].'.home');

    }
}
