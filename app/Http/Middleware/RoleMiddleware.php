<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!auth()->check()) {
            abort(403);
        }

        $user = auth()->user();

        if (!$user->role) {
            abort(403, 'User has no role assigned.');
        }

        if (in_array($user->role->role_name, $roles)) {
            return $next($request);
        }

        abort(403, 'Unauthorized');
    }
}
