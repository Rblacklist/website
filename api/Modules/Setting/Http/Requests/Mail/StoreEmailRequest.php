<?php

namespace Modules\Setting\Http\Requests\Mail;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmailRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'mailer' => ['required', 'string'],
            'host' => ['required', 'string'],
            'port' => ['required', 'numeric'],
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
            'encryption' => ['required', 'string'],
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
