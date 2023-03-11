<?php

namespace App\Http\Requests;


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
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users,email,'.$id,
        //     'password' => 'same:confirm-password',
        //     'is_active' => '',
        //     'is_super' => '',
        //     'country' => '',
        //     'languages' => '',
        //     'avatar' => '',
        ];
    }

    public function messages()
    {
        return [
        ];
    }
}
