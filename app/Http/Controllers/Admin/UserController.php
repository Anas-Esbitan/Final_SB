<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // عرض جميع المستخدمين
    public function index()
    {
        $users = User::all();  // جلب جميع المستخدمين من قاعدة البيانات
        return view('admin.users.index', compact('users'));  // إرجاع المستخدمين للعرض في الصفحة
    }

    // عرض نموذج إضافة مستخدم جديد
    public function create()
    {
        return view('admin.users.create');  // عرض النموذج
    }

    public function store(Request $request)
    {
        $request->validate([
            'First_name' => 'required|string|max:255',
            'Last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'phone_number' => 'nullable|string|max:10',
            'role' => 'required|string',
            'address' => 'nullable|string|max:255',
        ]);

        $user = new User();
        $user->First_name = $request->First_name;
        $user->Last_name = $request->Last_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone_number = $request->phone_number;
        $user->role = $request->role;
        $user->address = $request->address;
        $user->save();  

        return redirect()->route('admin.users')->with('success', 'User created successfully!');
    }

  
    public function edit($user_id)
    {
        $user = User::findOrFail($user_id);  // جلب المستخدم باستخدام ID
        return view('admin.users.edit', compact('user'));  // عرض النموذج مع البيانات
    }

    // تحديث بيانات المستخدم
    public function update(Request $request, $user_id)
    {
        $request->validate([
            'First_name' => 'required|string|max:255',
            'Last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user_id,
            'password' => 'nullable|string|min:8|confirmed',
            'phone_number' => 'nullable|string|max:10',
            'role' => 'required|string',
            'address' => 'nullable|string|max:255',
        ]);

        $user = User::findOrFail($user_id);
        $user->First_name = $request->First_name;
        $user->Last_name = $request->Last_name;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);  
        }
        $user->phone_number = $request->phone_number;
        $user->role = $request->role;
        $user->address = $request->address;
        $user->save();

        return redirect()->route('admin.users')->with('success', 'User updated successfully!');
    }

    // حذف المستخدم
    public function destroy($user_id)
    {
        $user = User::findOrFail($user_id);
        $user->delete();

        return redirect()->route('admin.users')->with('success', 'User deleted successfully!');
    }
}