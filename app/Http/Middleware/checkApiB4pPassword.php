<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class checkApiB4pPassword
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if( $request->api_password_b4p !== 'kd*sk2JS$F4D98@g85w4'){
            return response()->json(['message' => 'Unauthenticated.']);
        }

        return $next($request);
    }
}
