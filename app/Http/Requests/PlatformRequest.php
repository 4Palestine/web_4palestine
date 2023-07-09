<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PlatformRequest
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
            'is_active'=>['required' , 'boolean'],
            'name_en'=>['required' , 'string' , 'max:255' , 'min:3'],
            'name_ar'=>['required' , 'string' , 'max:255' , 'min:3'],
            'description_en'=>['nullable' , 'min:5'],
            'description_ar'=>['nullable' , 'min:5'],
        ];
    }

    public function messages()
    {
        return [
        ];
    }
}
