<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureUserIsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->role === 'admin') {
            return $next($request);
        }

        return redirect('/')->with('error', 'Access denied');
    }
}