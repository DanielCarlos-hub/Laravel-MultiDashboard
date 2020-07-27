<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class ProfessorMiddleware
{
    protected $dashboards = [
        1 => 'aluno',
        3 => 'diretor',
        4 => 'administrador'
    ];
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

        if (Auth::user()->role_id  == 2) {
            return $next($request);
        }


		return redirect()->route($this->dashboards[Auth::user()->role_id ].'.home');

    }
}
