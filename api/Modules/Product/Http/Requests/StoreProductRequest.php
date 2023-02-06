<?php

namespace Modules\Product\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            "name" => ['required', 'string', 'min:2', 'max:191'],
            'price' => ['required', 'numeric', 'gt:0'],
            'quantity' => ['required', 'numeric', 'gt:0'],
            'weight' => ['required', 'numeric', 'gt:0'],
            'status' => ['sometimes', 'boolean'],

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
