<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Traits\ApiResponses;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthenticatedSessionController extends Controller
{
    use ApiResponses;
    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request) {
    try {
        $validateUser = Validator::make($request->all(),
        [
            'email' => 'required|email',
            'password' => 'required',
            'otp_code' => 'string',
        ]);

        if($validateUser->fails()){
            return $this->fail(status: false, code: 401, message: "validation error", errors: $validateUser->errors());
        }


        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return $this->fail(status: false, code: 404, message: "Email & Password does not match with our record.");
        }

        if(!$user->is_active) {
            return $this->fail(status: false, code: 401, message: "Your account is not allowed to be login !");
        }

        if(!$user->email_verified_at) {
            // Check if the user has an email verification record
            if (!$user->emailVerification) {
                return response(['errors'=>['Email not verified']], 422);
            }

            // Check if the OTP code is valid
            if ($user->emailVerification->code !== $request->otp_code) {
                return response(['errors'=>['Invalid OTP code']], 422);
            }

            // Mark the user's email as verified
            $user->email_verified_at = now();
            $user->save();

            // delete the otp code record after verify user email
            $user->emailVerification->delete();
        }
        return $this->success(status: true, code: 200, message: "User Logged In Successfully", data: ['token' => $user->createToken("API TOKEN")->plainTextToken]);

    } catch (\Throwable $th) {
        return $this->fail(status: false, code: 500, message: $th->getMessage());
    }
}
    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): Response
    {
        auth()->user()->tokens()->delete();

        return response([
            'status' => true,
            'message' => 'Logged Out Successfully',
        ]);

    }
}
