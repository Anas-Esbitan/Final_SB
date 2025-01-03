<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{
    public function showProfile()
    {
        // تحقق إذا كان المستخدم لديه الدور "user"
        if (auth()->user()->role !== 'user') {
            return redirect('/')->with('error', 'Access denied'); // منع الوصول
        }

        // عرض صفحة البروفايل
        return view('userside.user-profile', ['user' => auth()->user()]);
    }

    // عرض نموذج تعديل البيانات
    public function editProfile()
    {
       
        if (auth()->user()->role !== 'user') {
            // return redirect('/')->with('error', 'Access denied'); // منع الوصول
        }

        // عرض نموذج التعديل مع بيانات المستخدم الحالية
        return view('userside.edit-profile', ['user' => auth()->user()]);
    }

    // تحديث بيانات الملف الشخصي
    public function updateProfile(Request $request)
    {
        // تحقق إذا كان المستخدم لديه الدور "user"
        if (auth()->user()->role !== 'user') {
            return redirect('/')->with('error', 'Access denied'); // منع الوصول
        }

        // التحقق من صحة المدخلات
        $request->validate([
            'First_name' => 'required|string|max:255',
            'Last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . auth()->id(),
            'phone_number' => 'nullable|string|max:10',
            'address' => 'nullable|string|max:10',
            'password' => 'nullable|string|min:8|confirmed',  // كلمة المرور اختيارية
        ]);

        $user = auth()->user();  // جلب بيانات المستخدم الحالي

        // تحديث البيانات
        $user->First_name = $request->First_name;
        $user->Last_name = $request->Last_name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->address = $request->address;

        // إذا تم تغيير كلمة المرور، قم بتحديثها
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);  // تشفير كلمة المرور
        }

        $user->save();  // حفظ التغييرات في قاعدة البيانات

        return redirect()->route('user.profile')->with('success', 'Profile updated successfully!');
    }
    public function showUserWithProducts($id)
{
    // جلب المستخدم مع المنتجات الخاصة به
    $user = User::with('products')->findOrFail($id);

    return view('user.profile', compact('user'));
}
}