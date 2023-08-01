<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Traits\ApiResponses;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;

class NewPasswordController extends Controller
{
    use ApiResponses;

    public function __construct()
    {
        $this->middleware('guest:mobile');
    }
    protected function guard()
    {
        return Auth::guard('mobile');
    }



    public function ensure_otp_reset_password(Request $request): JsonResponse
    {
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return $this->tiny_fail(status: false, code: 404, message: "User not found");
        }

        $reset = DB::table('password_reset_tokens')->where('email', $user->email);
        $latestReset = $reset->latest()->first();

        if (!$latestReset || $latestReset->token !== $request->otp_code) {
            return $this->tiny_fail(status: false, code: 422, message: __('messages.invalid_otp_code'));
        }

        return $this->tiny_success_t(code: 200, message: __('messages.successful_otp'));
    }
    /**
     * Handle an incoming new password request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): JsonResponse
    {
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return $this->tiny_fail(status: false, code: 404, message: __('messages.user_not_found'));
        }

        $reset = DB::table('password_reset_tokens')->where('email', $user->email);
        $latestReset = $reset->latest()->first();

        if (!$latestReset || $latestReset->token !== $request->otp_code) {
            return $this->tiny_fail(status: false, code: 422, message: __('messages.invalid_otp_code'));
        }

        $user->password = bcrypt($request->password);
        $user->save();

        $reset->delete();

        return $this->tiny_success_t(code: 200, message: __('messages.password_reset_successful'));


    }
    // {
    //     $request->validate([
    //         'token' => ['required'],
    //         'email' => ['required', 'email'],
    //         'password' => ['required', 'confirmed', Rules\Password::defaults()],
    //     ]);

    //     // Here we will attempt to reset the user's password. If it is successful we
    //     // will update the password on an actual user model and persist it to the
    //     // database. Otherwise we will parse the error and return the response.
    //     $status = Password::broker('users')->reset(
    //         $request->only('email', 'password', 'password_confirmation', 'token'),
    //         function ($user) use ($request) {
    //             $user->forceFill([
    //                 'password' => Hash::make($request->password),
    //                 'remember_token' => Str::random(60),
    //             ])->save();

    //             event(new PasswordReset($user));
    //         }
    //     );

    //     if ($status != Password::PASSWORD_RESET) {
    //         throw ValidationException::withMessages([
    //             'email' => [__($status)],
    //         ]);
    //     }

    //     return response()->json(['status' => __($status)]);
    // }
}
