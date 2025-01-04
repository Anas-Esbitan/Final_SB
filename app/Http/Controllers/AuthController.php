<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; 
use App\Models\Admin;

class AuthController extends Controller
{
    
    public function showUserRegisterForm()
    {
        return view('auth.user-register');
    }

    public function userRegister(Request $request)
    {
        $request->validate([
            'First_name' => 'required|string|max:255',
            'Last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
             'phone_number' => 'nullable|string|min:10|max:15',
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'First_name' => $request->First_name,
            'Last_name' => $request->Last_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
             'phone_number' => $request->phone_number,
            'role' => 'user', 
        ]);

        return redirect()->route('login')->with('success', 'User registered successfully!');
    }


    public function showAdminRegisterForm()
    {
        return view('auth.admin-register');
    }


    public function adminRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:6|confirmed',
        ]);

        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('admin.login')->with('success', 'Admin registered successfully!');
    }


    public function showUserLoginForm()
    {
        return view('auth.user-login');
    }

   public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password, 'role' => 'admin'])) {
        return redirect()->route('admin.dashboard');
    }

    return back()->withErrors(['email' => 'Invalid credentials or you are not an admin']);
}

    public function showAdminLoginForm()
    {
        return view('auth.admin-login');
    }


    public function adminLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (Auth::guard('admin')->attempt($request->only('email', 'password'))) {
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }


//     public function logout(Request $request)
// {
//     if (Auth::guard('admin')->check()) {
//         Auth::guard('admin')->logout();
//         return redirect()->route('admin/login');
//     } else {
//         Auth::guard('web')->logout();
//         return redirect('login')->route('login');
//     }
// }
}