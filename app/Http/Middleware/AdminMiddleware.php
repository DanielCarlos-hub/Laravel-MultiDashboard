<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminMiddleware
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

        if (Auth::user()->role->slug == 'administrador') {
            return $next($request);
        }

		$dashboards = [
            'aluno' => 'aluno',
            'professor' => 'professor',
            'diretor' => 'diretor'
        ];

		return redirect()->route($dashboards[Auth::user()->role->slug].'.home');

    }
}
