<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

	public function redirectTo()
    {
        switch(auth()->user()->role->slug){

            case 'administrador':
                $this->redirectTo = '/admin/home';
                return $this->redirectTo;
                break;

            case 'diretor':
                $this->redirectTo = '/diretor/home';
                return $this->redirectTo;
                break;

            case 'professor':
                $this->redirectTo = '/professor/home';
                return $this->redirectTo;
                break;

            case 'aluno':
                $this->redirectTo = '/aluno/home';
                return $this->redirectTo;
                break;

            default:
                $this->redirectTo = '/';
                return $this->redirectTo;
        }

    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect('/');
    }
}
