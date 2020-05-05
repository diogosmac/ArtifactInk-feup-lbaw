<?php

namespace App\Http\Middleware;

use App\Admin;
use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{

    public function handle($request, Closure $next)
    {
        dd(Auth::guard('admin'));
        // redirect to admin login page if admin not logged in
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.sign_in');
        } else {
            return $next($request);
        }
        
        return $next($request);
    }
}