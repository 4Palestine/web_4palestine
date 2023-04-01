<?php

namespace App\Http\Traits;

use App\Mail\VerifyEmail;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


trait verifyByOTP
{
    // Generate OTP Code
    protected function generateOtpCode() {
        return Str::random(6); // generates a random 6-digit OTP code
    }


    // Store OTP Code
    protected function storeOtpCode($userId, $otpCode, $minutes = 5) {
        Cache::put('otp_' . $userId, $otpCode, $minutes);
    }


    // Send OTP Code via Email
    protected function sendOtpCodeByEmail($email, $otpCode) {
        Mail::to($email)->send(new VerifyEmail($otpCode));
    }



    // Verify OTP Code
    // protected function verifyOtpCode($userId, $enteredOtpCode) {
    //     $storedOtpCode = Cache::get('otp_' . $userId);

    //     if ($enteredOtpCode == $storedOtpCode) {
    //         // OTP code matched, log in the user
    //         return true;
    //     } else {
    //         // OTP code didn't match, ask the user to reenter the OTP code
    //         return false;
    //     }
    // }
}
