<?php

namespace App\Http\Middleware;

use Closure;

class CheckIntegerParameter
{
    public function handle($request, Closure $next)
    {
        if ($request->integer < 1 || $request->integer > 3999) // Must be between 1 & 3999
        {
            return app('App\Http\Controllers\ApiErrorController')->invalidValue();
        }

        return $next($request); // Continue the request chain
    }
}
