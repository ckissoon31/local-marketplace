<?php

namespace App\Domains\User\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {

        if (!$request->user()->hasRole($role)) {
            abort(403, "Access denied. $role account required.");
        }
        return $next($request);
       
    }
}
