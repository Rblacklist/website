<?php

namespace Modules\Source\Http\Requests\TypeSource;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTypeSourceRequest extends FormRequest
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
            'name' => ['sometimes', 'string', 'unique:type_sources,name'],
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
