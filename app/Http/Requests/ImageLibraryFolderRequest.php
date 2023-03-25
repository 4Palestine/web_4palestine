<?php

namespace App\Http\Requests;


class ImageLibraryFolderRequest
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
            'is_active'=>['required' , 'boolean'],
        ];
    }

    public function messages()
    {
        return [
        ];
    }
}
