<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo;


    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

	public function redirectTo()
    {
        switch(auth()->user()->role_id){

            case 4:
                $this->redirectTo = '/admin/home';
                return $this->redirectTo;
                break;

            case 3:
                $this->redirectTo = '/diretor/home';
                return $this->redirectTo;
                break;

            case 2:
                $this->redirectTo = '/professor/home';
                return $this->redirectTo;
                break;

            case 1:
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
