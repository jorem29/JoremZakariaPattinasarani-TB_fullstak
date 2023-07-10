<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewController extends Controller
{
    public function login()
    {
        return view ('frontend.login');
    }

    public function register()
    {
        return view ('frontend.register');
    }
    public function dashboard()
    {
        return view ('frontend.dashboard');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
