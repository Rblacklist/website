<?php

namespace Modules\Order\Http\Requests\StatusOrders;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStatusOrderRequest extends FormRequest
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
            'status' => ['sometimes', 'boolean', 'between:0,1']
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
