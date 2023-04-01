<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
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

        event(new Registered($user));

        // Auth::guard('user')->login($user);
        $user->createToken("API TOKEN")->plainTextToken;

        return $this->success(status: true, code: 200, message: "User Logged In Successfully", data: ['token' => $user->createToken("API TOKEN")->plainTextToken]);

    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
    //         'password' => ['required', 'confirmed', Rules\Password::defaults()],
    //         'country' => '',
    //         'languages' => '',
    //     ]);
    //     $user = User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //         'country' => 'palestine',
    //         'languages' => ["ar", "en"],
    //     ]);
    //     $otpCode = $this->generateOtpCode();
    //     $this->storeOtpCode($user->id, $otpCode);
    //     $this->sendOtpCodeByEmail($user->email, $otpCode);
    //     return response([
    //         'status' => true,
    //         'message' => 'User Registerd Successfully, Check Your Email To Verify Your Account And Login',
    //     ]);
    // }
}
