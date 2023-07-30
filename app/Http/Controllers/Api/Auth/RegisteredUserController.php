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
                'country' => 'palestine',
                'languages' => ["ar", "en"],

            ]);

            $verification = $user->createEmailVerification();

            try {
                Mail::to($user->email)->send(new VerifyEmail($verification->code));
                return $this->tiny_success_t(message: "A verification code has been sent to your email.");
            } catch (\Exception $e) {
                return $this->tiny_fail(message: "Something went wrong, try again");
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
            return $this->tiny_success_t(message: "A verification code has been Re-sent to your email.");
        } catch (\Exception $e) {
            return $this->tiny_fail(message: "Something went wrong, try again");
        }
    }
}
