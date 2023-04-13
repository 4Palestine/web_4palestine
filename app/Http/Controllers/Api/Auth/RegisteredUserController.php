<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Traits\ApiResponses;
use App\Mail\VerifyEmail;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
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
            return $this->tiny_success(message: "A verification code has been sent to your email.");
        } catch (\Exception $e) {
            return $this->tiny_fail(message: "Something went wrong, try again");
        }
    }

}
