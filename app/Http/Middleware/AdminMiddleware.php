<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        // Check if the authenticated user is an admin
        if (auth()->check() && auth()->user()->isAdmin()) {
            return $next($request);
        }

        // Redirect or perform actions for non-admin users
        return redirect()->route('home'); // You can customize the redirect route
    }
}
