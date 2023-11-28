<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CanViewUserProfile
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $requestedUserId = $request->route('id');
        $loggedInUser = $request->user();

        if ($loggedInUser->user_type !== 1 && $loggedInUser->id != $requestedUserId) {
            abort(403, 'Unauthorized.'); // Or redirect or handle unauthorized access
        }
        return $next($request);
    }
}
