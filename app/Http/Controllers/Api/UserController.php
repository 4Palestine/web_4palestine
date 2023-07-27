<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\UserResource;
use App\Http\Traits\ApiResponses;
use App\Http\Traits\uploadFile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    use uploadFile, ApiResponses;



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = auth()->user();
        $user_data = new UserResource($user);

        $missions = count($user->missions);
        $stars = DB::table('user_stars')->select('stars')->where('user_id', $user->id)->get();

        return $this->success_single_response(code: 200, message: "user data returned successfully", data:['user' => $user_data , 'missions' => $missions , 'total_stars' => $stars], meta: null);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'name' => '',
            'country' => '',
            'languages' => '',
            'avatar' => '' // should be image from tha flutter application
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->fail(status: false, code: 442, message: "", errors: $validator->errors(), data: null);
        }

        $user = auth()->user();
        $user_data = new UserResource($user);


        $userUpdated = $user->update([
            'name' => $request->name,
            'country' => $request->country,
            'languages' => $request->input('languages'),
            'avatar' => $this->uploadFile(request: $request, old_image: $user->avatar, filename: 'avatar', path: 'uploads/users'),
        ]);

        if (!$userUpdated) {
            return $this->tiny_fail(status: false, code: 404, message: "Somthing Went Wrong !!");
        }
        // return $this->tiny_success(status: false, code: 200, message: "Your profile has been updated successfully");
        return $this->success_single_response(code: 200, message: "Your profile has been updated successfully", data: $user_data, meta: null);
    }


    public function updatePassword(Request $request, $id)
    {
        $rules = [
            'old_password' => '',
            'password' => 'same:password_confirmation',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->fail(status: false, code: 442, message: "", errors: $validator->errors(), data: null);
        }

        $user = auth()->user();

        if(Hash::check($request->old_password, $user->password)) {
            if (empty($request->password)) {
                $password = $user->password;
            } elseif(!empty($request->password) && $request->password == $request->password_confirmation) {
                $password = Hash::make($request->password);
            } else {
                return $this->tiny_fail(status: false, code: 442, message: "the password confirmation does not match. Please make sure you enter the same password in both fields");
            }
        } else {
            return $this->tiny_fail(status: false, code: 442, message: "The old password is not correct, try again");
        }


        $userUpdated = $user->update([
            'password' => $password,
        ]);

        if (!$userUpdated) {
            return $this->tiny_fail(status: false, code: 404, message: "Somthing Went Wrong !!");
        }
        return $this->tiny_success(status: false, code: 200, message: "Your Password has been updated successfully");
    }
}
