<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\UserResource;
use App\Http\Traits\ApiResponses;
use App\Http\Traits\uploadFile;
use App\Models\User;
use App\Models\UserStar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Type\Integer;

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
        // $user = auth()->user();
        $user = User::find($id);
        $user_data = new UserResource($user);

        $missions = count($user->missions);

        $stars = $user->stars->stars ?? null;

        return $this->success_single_response(code: 200, message: __('messages.user_data_successfully'), data:['user' => $user_data , 'missions' => $missions , 'stars' => $stars], meta: null);
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
            'avatar' => 'image' // should be image from tha flutter application
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
            'avatar' => $request->avatar ? $this->uploadFile(request: $request, old_image: $user->avatar, filename: 'avatar', path: 'uploads/users') : $user->core_avatar,
        ]);

        if (!$userUpdated) {
            return $this->tiny_fail(status: false, code: 404, message: __('messages.something_wrong'));
        }
        // return $this->tiny_success(status: false, code: 200, message: "Your profile has been updated successfully");
        return $this->success_single_response(code: 200, message: __('messages.profile_updated'), data: $user_data, meta: null);
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
                return $this->tiny_fail(status: false, code: 442, message: __('messages.password_confirmation_not_match'));
            }
        } else {
            return $this->tiny_fail(status: false, code: 442, message: __('messages.old_password_not_correct'));
        }


        $userUpdated = $user->update([
            'password' => $password,
        ]);

        if (!$userUpdated) {
            return $this->tiny_fail(status: false, code: 404, message: __('messages.something_wrong'));
        }
        return $this->tiny_success(status: false, code: 200, message: __('messages.password_updated'));
    }
}
