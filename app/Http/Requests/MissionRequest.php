<?php

namespace App\Http\Requests;


class MissionRequest
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
            'image' => [ 'image' , 'max:1024' , 'mimes:jpeg,png,jpg,gif'],
            'mission_link'=> ['required' , 'min:3' , 'max:1000'],
            'platform_id'=>['required'],
            'mission_duration'=>['string'],
            'mission_type'=>['string'],
            'mission_stars'=>['required','string'],
            'description_en' => ['nullable' , 'min:5'],
            'description_ar' => ['nullable' , 'min:5'],
            'is_active'=>['required' , 'boolean'],
        ];
    }

    public function messages()
    {
        return [
        ];
    }
}
