<?php

namespace App\Http\Requests;


class TagRequest
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
            'platform_id' => ['required'],
            'name_en'=>['required' , 'string' , 'max:255' , 'min:3'],
            'name_ar'=>['required' , 'string' , 'max:255' , 'min:3'],
        ];
    }

    public function messages()
    {
        return [
        ];
    }
}
