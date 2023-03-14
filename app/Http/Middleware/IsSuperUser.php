<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsSuperUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()){
            if(Auth::guard('mobile')->user()->is_super === 1){
                return $next($request);
            } else {
                return response()->error(status: false, message: 'You dont have the permission to this page !');
            }
        } else {
            return response()->error(status: false, message: 'You are not loged in !');
        }
    }
}
