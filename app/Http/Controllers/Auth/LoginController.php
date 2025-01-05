<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';
    public function authenticated()
    {
       
        if (Auth::check() && Auth::user()->role == 'user') {
            return redirect('/')->with('status', 'Logged in successfully as a user');
        }

     
        Auth::logout();
        return redirect('/login')->withErrors(['error' => 'Unauthorized access.']);
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
}