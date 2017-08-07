<?php

namespace App\Http\Middleware;

use Closure;

class CheckIntegerParameter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->integer < 1 || $request->integer > 3999)
        {
            return response([
                'error' => [
                    'Message' => 'Invalid Request',
                    'Error' => 'Integer to convert must be between 1 & 3999'
                ]
            ], 400);
        }

        return $next($request);
    }
}
