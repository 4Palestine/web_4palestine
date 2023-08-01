<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Traits\ApiResponses;
use App\Mail\VerifyEmail;
use App\Models\EmailVerification;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    use ApiResponses;

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'country' => '',
            'languages' => '',
        ]);



        // try {
        //     DB::beginTransaction();

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'country' => null,
                'languages' => null,

            ]);

            $verification = $user->createEmailVerification();

            try {
                Mail::to($user->email)->send(new VerifyEmail($verification->code));
                return $this->tiny_success_t(message: __('messages.verification_code_sent_email'));
            } catch (\Exception $e) {
                return $this->tiny_fail(message: __('messages.something_wrong'));
            }
            // $this->sendOtpEmail($user);
        //     DB::commit();
        // } catch (\Exception $e) {
        //     DB::rollBack();
        // }
    }



    public function resendOtpCode() {
        $email = request()->email;

        $user = User::where('email', $email)->active()->first();

        if($user->emailVerification) {
            $user->emailVerification()->delete();
        }

        $verification = $user->createEmailVerification();

        try {
            Mail::to($user->email)->send(new VerifyEmail($verification->code));
            return $this->tiny_success_t(message: __('messages.verification_code_resent_email'));
        } catch (\Exception $e) {
            return $this->tiny_fail(message: __('messages.something_wrong'));
        }
    }
}
