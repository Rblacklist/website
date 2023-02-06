<?php

namespace Modules\Apis\Transformers\ApiDeliveries;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ApiDeliveryCollection extends ResourceCollection
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
