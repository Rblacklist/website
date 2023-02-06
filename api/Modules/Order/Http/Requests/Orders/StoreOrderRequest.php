<?php

namespace Modules\Order\Http\Requests\Orders;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
            'note' => ['required', 'string'],
            'delivery_type' => ['required', 'string',],
            'customer_id' => ['required', 'exists:customers,id'],
            'source_id' => ['required', 'exists:sources,id'],
            'store_id' => ['required', 'exists:stores,id'],
            'delivery_company_id' => ['required', 'exists:delivery_companies,id'],
            'is_sent' => ['required', 'boolean'],
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
