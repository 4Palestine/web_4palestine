<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyOtpCode
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();
        $verification = $user->emailVerification;

        if (!$verification || $verification->code !== $request->input('otp_code')) {
            return response(['errors'=>['Invalid OTP code']], 422);
        }

        if ($verification->expires_at->isPast()) {
            return response(['errors'=>['OTP code has expired']], 422);
        }

        // Delete the email verification record
        $verification->delete();

        return $next($request);
    }
}
