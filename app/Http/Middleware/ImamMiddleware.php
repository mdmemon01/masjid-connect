<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ImamMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check() || (!auth()->user()->isImam() && !auth()->user()->isAdmin())) {
            return redirect()->route('home')->with('error', 'Access denied. Imam permission required.');
        }

        return $next($request);
    }
}