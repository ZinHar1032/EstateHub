<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticatedRole
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {

            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect()->route('dashboard.admin');
            }

            if ($user->role === 'agent') {
                return redirect()->route('dashboard.agent');
            }

            if ($user->role === 'client') {
                return redirect()->route('dashboard.client');
            }
        }

        return $next($request);
    }
}
