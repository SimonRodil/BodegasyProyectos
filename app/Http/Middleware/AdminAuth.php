<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuth
{
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('sert_cpanel')) {
            return redirect()->route('admin.login');
        }

        $user = \App\Models\User::find(session('sert_cpanel.id'));
        if (!$user) {
            session()->forget('sert_cpanel');
            return redirect()->route('admin.login');
        }

        Auth::setUser($user);

        return $next($request);
    }
}
