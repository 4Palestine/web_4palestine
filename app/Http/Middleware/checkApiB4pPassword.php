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
        if($request->header('api-password-b4p') !== env('API_PASSWORD_B4P', 'kds@k2J#SF*4D98g!85w4')){
            return response()->json(['message' => 'Unauthenticated.']);
        }

        return $next($request);
    }
}
