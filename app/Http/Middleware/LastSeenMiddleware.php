<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class LastSeenMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if ($user) {
            // Check if the user model is an instance of Eloquent
            if ($user instanceof \Illuminate\Database\Eloquent\Model) {
                $user->update(['last_seen_at' => now()]);
            }
        } else {
            Session::put('last_seen_at', now());
        }

        return $next($request);
    }

    
}
