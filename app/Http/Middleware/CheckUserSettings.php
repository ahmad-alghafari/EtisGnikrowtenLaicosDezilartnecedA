<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserSettings
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the authenticated user ID matches the user ID in the route
        $userIdInRoute = $request->route('user');

        if (Auth::check() && Auth::user()->id == $userIdInRoute) {
            return $next($request);
        }

        // Redirect or respond with an error if the user is not authorized
        return redirect()->back()->with('error', 'Unauthorized access to user settings.');
    }
}
