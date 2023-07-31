<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Traits\ApiResponses;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    use ApiResponses;

    /**
     * Register User
     * @param Request $request
     * @return User
     */
    public function register(Request $request)
    {
        try {
            //Validated
            $validateUser = Validator::make(
                $request->all(),
                [
                    'name' => 'required',
                    'email' => 'required|email|unique:users,email',
                    'password' => 'required'
                ]
            );

            if ($validateUser->fails()) {
                return $this->fail(status: false, code: 401, message: __('messages.validation_error'), errors: $validateUser->errors());
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);


            event(new Registered($user));


            return $this->success(status: true, code: 200, message: __('messages.user_created_successfully'), data: ['token' => $user->createToken("API TOKEN")->plainTextToken]);

        } catch (\Throwable $th) {
            return $this->fail(status: false, code: 500, message: $th->getMessage());
        }
    }


    /**
     * Login User
     * @param Request $request
     * @return User
     */
    public function login(Request $request)
    {
        try {
            $validateUser = Validator::make($request->all(),
            [
                'email' => 'required|email',
                'password' => 'required'
            ]);

            if($validateUser->fails()){
                return $this->fail(status: false, code: 401, message: __('messages.validation_error'), errors: $validateUser->errors());
            }

            // if(!Auth::guard('user')->attempt($request->only(['email', 'password']))){
            //     return $this->fail(status: false, code: 401, message: "Email & Password does not match with our record.");
            // }

            $user = User::where('email', $request->email)->where('is_active', 1)->first();

            if(!$user || !Hash::check($request->password, $user->password)) {
                return $this->fail(status: false, code: 401, message: __('messages.credentials_records'));
            }
            $token = $user->createToken("API TOKEN")->plainTextToken;
            return $this->success(status: true, code: 200, message: __('messages.user_logged_in_successfully'), data: ['token' => $token]);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }


    public function logout()
    {
        auth()->user()->tokens()->delete();
        return $this->success(status: true, code: 200, message: __('messages.logged_out'));

    }
}
