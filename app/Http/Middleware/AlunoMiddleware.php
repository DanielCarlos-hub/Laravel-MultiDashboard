<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AlunoMiddleware
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

        if (Auth::user()->role->slug == 'aluno') {
            return $next($request);
        }

		$dashboards = [
            'professor' => 'professor',
            'diretor' => 'diretor',
            'administrador' => 'administrador'
        ];

		return redirect()->route($dashboards[Auth::user()->role->slug].'.home');

    }
}
