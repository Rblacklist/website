<?php

namespace Modules\Order\Http\Requests\Orders;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderRequest extends FormRequest
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
            'order_number' => ['sometimes', 'string',],
            'note' => ['sometimes', 'string'],
            'delivery_type' => ['sometimes', 'string',],
            'customer_id' => ['sometimes', 'exists:customers,id'],
            'source_id' => ['sometimes', 'exists:sources,id'],
            'store_id' => ['sometimes', 'exists:stores,id'],
            'delivery_company_id' => ['sometimes', 'exists:delivery_companies,id'],
            'status_order_id' => ['sometimes', 'exists:status_orders,id'],
            'is_sent' => ['sometimes', 'boolean'],
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
