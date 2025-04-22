<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{
    public function showProfile()
    {
        
        if (auth()->user()->role !== 'user') {
            return redirect('/')->with('error', 'Access denied'); // منع الوصول
        }

       
        return view('userside.user-profile', ['user' => auth()->user()]);
    }

 
    public function editProfile()
    {
       
        if (auth()->user()->role !== 'user') {
            // return redirect('/')->with('error', 'Access denied'); // منع الوصول
        }

      
        return view('userside.edit-profile', ['user' => auth()->user()]);
    }

    
    public function updateProfile(Request $request)
    {
        
        if (auth()->user()->role !== 'user') {
            return redirect('/')->with('error', 'Access denied'); 
        }

        $request->validate([
            'First_name' => 'required|string|max:255',
            'Last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . auth()->id(),
            'phone_number' => 'nullable|string|max:10',
            'address' => 'nullable|string|max:10',
            'password' => 'nullable|string|min:8|confirmed',  
        ]);

        $user = auth()->user(); 

       
        $user->First_name = $request->First_name;
        $user->Last_name = $request->Last_name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->address = $request->address;

       
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);  // تشفير كلمة السر
        }

        $user->save();  

        return redirect()->route('user.profile')->with('success', 'Profile updated successfully!');
    }
    public function showUserWithProducts($id)
{
  
    $user = User::with('products')->findOrFail($id);

    return view('user.profile', compact('user'));
}
}
