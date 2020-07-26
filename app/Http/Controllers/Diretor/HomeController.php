<?php

namespace App\Http\Controllers\Diretor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        return view('diretor.home');

    }
}
