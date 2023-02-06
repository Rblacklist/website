<?php

namespace Modules\Apis\Http\Requests\ApiShops;

use Illuminate\Foundation\Http\FormRequest;

class UpdateApiShopRequest extends FormRequest
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
            'name' => ['sometimes', 'string'],
            'key_id' => ['sometimes', 'string'],
            'key_secret' => ['sometimes', 'string'],
            'status' => ['sometimes', 'between:0,1']
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
