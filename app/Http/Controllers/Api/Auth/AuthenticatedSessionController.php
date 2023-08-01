<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Traits\ApiResponses;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthenticatedSessionController extends Controller
{
    use ApiResponses;
    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request)
    {
        try {
            // validate request inputs
            $this->validate_login_request($request);

            $user = User::where('email', $request->email)->first();
            $user_resource = $this->user_resource($user);
            if (!$user || !Hash::check($request->password, $user->password)) {
                return $this->fail(status: false, code: 404, message: __('messages.email_password'));
            }

            if($user->email_verified_at === NULL) {
                return $this->fail(status: false, code: 404, message: __('messages.verify'));
            }

            if (!$user->is_active) {
                return $this->fail(status: false, code: 401, message: __('messages.not_allowed_login'));
            }
            $token = $user->createToken("API TOKEN")->plainTextToken;

            return $this->success_single_response(code: 200, message: __('messages.user_logged_in_successfully'), data: $user_resource, meta:["token" => $token]);
            #  return $this->success(status: true, code: 200, message: "User Logged In Successfully", data: ['user_data' => $user, 'meta' => ['token' => $user->createToken("API TOKEN")->plainTextToken]]);
        } catch (\Throwable $th) {
            return $this->fail(status: false, code: 500, message: $th->getMessage());
        }
    }


    public function store_with_otp(Request $request) {
        try {
            // validate request inputs
            $validateUser = Validator::make(
                $request->all(),
                [
                    'email' => 'required|email',
                    'otp_code' => 'string',
                ]
            );
            if ($validateUser->fails()) {
                return $this->fail(status: false, code: 401, message: __('messages.validation_error'), errors: $validateUser->errors());
            }


            $user = User::where('email', $request->email)->whereNull('email_verified_at')->first();
            $user_resource = $this->user_resource($user);
            if (!$user) {
                return $this->fail(status: false, code: 404, message: __('messages.registered'));
            }

            // Check if the user has an email verification record
            // هاد معناها انو مش باعت طلب تاكيد للحساب
            if (!$user->emailVerification || $user->emailVerification->code !== $request->otp_code) {
                return response(['errors' => ['Invalid OTP code']], 422);
            }


            // عملية تسجيل الدخول
            // email_verified_at و تحديث ال
            // otp و حذف ال
            try {
                DB::beginTransaction();
                $token = $user->createToken("API TOKEN")->plainTextToken;

                // Mark the user's email as verified
                $user->email_verified_at = now();
                $user->save();

                // delete the otp code record after verify user email
                $user->emailVerification->delete();

                DB::commit();
            } catch (Exception $exception) {
                DB::rollBack();
            }


            return $this->success_single_response(code: 200, message: __('messages.user_logged_in_successfully'), data: $user_resource, meta:["token" => $token]);

            # return $this->success(status: true, code: 200, message: "User Logged In Successfully", data: ['user_data' => $user, 'meta' => ['token' => $token]]);
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
            'message' => __('messages.logged_out'),
        ]);
    }


    public function validate_login_request($request)
    {
        $validateUser = Validator::make(
            $request->all(),
            [
                'email' => 'required|email',
                'password' => 'required',
                'otp_code' => 'string',
            ]
        );

        if ($validateUser->fails()) {
            return $this->fail(status: false, code: 401, message: __('messages.validation_error'), errors: $validateUser->errors());
        }
    }



    public function user_resource($user){
        return [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'email_verified_at' => $user->email_verified_at,
            'country' => $user->country,
            'languages' => $user->languages,
            'is_super' => $user->is_super,
            'avatar' => $user->avatar,
        ];
    }
}
