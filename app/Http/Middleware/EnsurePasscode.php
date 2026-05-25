<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsurePasscode
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        if (! $request->session()->get('access_granted')) {
            return redirect()->route('home')->with('status', 'Enter the assigned passcode to continue.');
        }

        return $next($request);
    }
}
