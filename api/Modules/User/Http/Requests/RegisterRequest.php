<?php

namespace Modules\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'firstName' => ['required', 'string', 'min:3', 'max:50'],
            'lastName' => ['required', 'string', 'min:3', 'max:50'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['min:8', 'max:100', 'required_with:passwordConfirmation', 'same:passwordConfirmation'],
            'passwordConfirmation' => ['min:8', 'max:100'],
            'code' => ['required', 'between:1,4'],
            'phone' => ['required', 'min:9', 'max:12']
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
