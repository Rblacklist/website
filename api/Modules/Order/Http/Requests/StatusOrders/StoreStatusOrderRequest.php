<?php

namespace Modules\Order\Http\Requests\StatusOrders;

use Illuminate\Foundation\Http\FormRequest;

class StoreStatusOrderRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'status' => ['required', 'boolean', 'between:0,1']
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
