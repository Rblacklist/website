<?php

namespace Modules\Customer\Transformers\Phones;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PhoneCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return $this->collection;
    }
}
