<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Traits\ApiResponses;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthenticatedSessionController extends Controller
{
    use ApiResponses;
    /**
     * Handle an incoming authentication request.
     */
    // public function store(LoginRequest $request): Response
    // {
    //     $request->authenticate();

    //     $request->session()->regenerate();

    //     return response()->noContent();
    // }
    public function store(Request $request) {
    try {
        $validateUser = Validator::make($request->all(),
        [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if($validateUser->fails()){
            return $this->fail(status: false, code: 401, message: "validation error", errors: $validateUser->errors());
        }

        if(!Auth::guard('user')->attempt($request->only(['email', 'password']))){
            return $this->fail(status: false, code: 401, message: "Email & Password does not match with our record.");
        }

        $user = User::where('email', $request->email)->first();

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
        // Auth::guard('user')->logout();

        // $request->session()->invalidate();

        // $request->session()->regenerateToken();

        // return response()->noContent();

        //////////////////////////////////////////////

        auth()->user()->tokens()->delete();

        return response([
            'status' => true,
            'message' => 'Logged Out Successfully',
        ]);

    }
}
