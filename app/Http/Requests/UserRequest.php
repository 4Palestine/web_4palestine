<?php

namespace App\Http\Requests;

use App\Models\User;

class UserRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            // 'email' => 'required|email|unique:users,email,'.$id,
            // 'password' => 'same:confirm-password',
            'is_active' => ['required' , 'boolean'],
            'is_super' => ['required' , 'boolean'],
            'country' => ['string'],
            'languages' => ['string' , 'min:3' , 'max:1000'],
            'avatar' => [ 'image' , 'max:1024' , 'mimes:jpeg,png,jpg,gif'],
        ];
    }

    public function messages()
    {
        return [
        ];
    }
}
