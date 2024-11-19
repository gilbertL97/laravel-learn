<?php

namespace Modules\Auth\Http\Middleware;

use Closure;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, ...$guards): Response
    {
        if (!Auth::guard($guards)->check()) {
            abort(401, 'You are not allowed to access this resource');
        }
        return $next($request);
    }
}
