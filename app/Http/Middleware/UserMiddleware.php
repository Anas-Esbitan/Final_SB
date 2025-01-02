<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserMiddleware
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
        // تحقق إذا كان المستخدم مسجلاً وله الدور "user"
        if (Auth::check() && Auth::user()->role === 'user') {
            return $next($request);
        }

        // إعادة توجيه المستخدم إذا لم يكن "user"
        return redirect('/')->with('error', 'Access denied');
    }
}