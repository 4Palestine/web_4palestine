<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Traits\ApiResponses;
use App\Mail\ResetPasswordMail;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;

class PasswordResetLinkController extends Controller
{
    use ApiResponses;

    public function __construct()
    {
        $this->middleware('guest:user');
    }
    protected function guard()
    {
        return Auth::guard('user');
    }
    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): JsonResponse
    {
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return $this->tiny_fail(status: false, code: 404, message: "User not found");
        }

        $otp = random_int(100000, 999999);



        if (DB::table('password_reset_tokens')->where('email', $user->email)->exists()) {
            DB::table('password_reset_tokens')
                ->where('email', $user->email)
                ->update([
                    'token' => $otp,
                    'created_at' => now(),
                ]);

        } else {
            DB::table('password_reset_tokens')->insert([
                'email' => $user->email,
                'token' => $otp,
                'created_at' => now(),
            ]);
        }

        try {
            Mail::to($user->email)->send(new ResetPasswordMail($user, $otp));
        } catch (Exception $exception) {
            return $this->tiny_fail(status: false, code: 403, message: "Something wend worng !!");
        }

        return $this->tiny_success(status: true, code: 200, message: "OTP code sent successfully");
    }
    // {
    //     $request->validate([
    //         'email' => ['required', 'email'],
    //     ]);

    //     // We will send the password reset link to this user. Once we have attempted
    //     // to send the link, we will examine the response then see the message we
    //     // need to show to the user. Finally, we'll send out a proper response.
    //     $status = Password::broker('users')->sendResetLink(
    //         $request->only('email')
    //     );

    //     if ($status != Password::RESET_LINK_SENT) {
    //         throw ValidationException::withMessages([
    //             'email' => [__($status)],
    //         ]);
    //     }

    //     return response()->json(['status' => __($status)]);
    // }
}
