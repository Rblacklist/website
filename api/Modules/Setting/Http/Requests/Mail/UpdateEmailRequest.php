<?php

namespace Modules\Setting\Http\Requests\Mail;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmailRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'mailer' => ['sometimes', 'string'],
            'host' => ['sometimes', 'string'],
            'port' => ['sometimes', 'numeric'],
            'email' => ['sometimes', 'email'],
            'password' => ['sometimes', 'string'],
            'encryption' => ['sometimes', 'string'],
            'is_selected' => ['sometimes', 'between:0,1'],
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
