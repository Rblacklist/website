<?php

namespace Modules\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'firstname' => ['sometimes', 'string', 'min:3', 'max:50'],
            'lastname' => ['sometimes', 'string', 'min:3', 'max:50'],
            'email' => ['sometimes', 'email'],
            'password' => ['min:8', 'max:100',  'confirmed'],
            'code' => ['sometimes', 'between:1,4'],
            'phone' => ['sometimes', 'min:9', 'max:12'],
            'email_verified_at' => ['sometimes', 'date'],
            'phone_verified_at' => ['sometimes', 'date']
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
