<?php

namespace Modules\Customer\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
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
            'fullname' => ['required', 'string', 'min:3', 'max:100'],
            'address' => ['required', 'string', 'min:3', 'max:100'],
            'city' => ['required', 'string', 'min:3', 'max:100'],
            'state' => ['required', 'string', 'min:3', 'max:100'],
            'status' => ['sometimes', 'boolean']
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
