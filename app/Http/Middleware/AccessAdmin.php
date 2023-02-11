<?php

namespace App\Http\Middleware;

use Closure;

class AccessAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->user()->user_type !== 'Admin') {
            auth()->logout();
            abort(404);
        };
        return $next($request);
    }

}
