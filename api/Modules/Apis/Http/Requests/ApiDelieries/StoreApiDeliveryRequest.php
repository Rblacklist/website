<?php

namespace Modules\Apis\Http\Requests\ApiDelieries;

use Illuminate\Foundation\Http\FormRequest;

class StoreApiDeliveryRequest extends FormRequest
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
            'name' => ['required', 'string', 'unique:api_deliveries,name'],
            'key_id' => ['required', 'string'],
            'key_secret' => ['required', 'string'],
            'status' => ['required', 'between:0,1']
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
