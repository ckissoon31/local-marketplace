<?php

namespace App\Domains\User\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsSeller
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (! $request->user() || ! $request->user()->hasRole('seller')) {
            abort(403, 'Access denied. Seller account required.');
        }
        return $next($request);
    }
}
