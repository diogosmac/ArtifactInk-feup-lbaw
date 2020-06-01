<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckBanned
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        // check if user is logged in and banned
        if (Auth::guard('web')->check() && Auth::guard('web')->user()->is_banned) {
            // logout user
            Auth::guard('web')->logout();
            // redirect to sign in page with error
            return redirect()
                ->route('sign_in')
                ->with('error', 'This account has been blocked. Please contact the store administrator');
        }

        return $next($request);
    }
}
