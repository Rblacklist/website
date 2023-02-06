<?php

namespace Modules\Order\Transformers\StatusOrders;

use Illuminate\Http\Resources\Json\ResourceCollection;

class StatusOrderCollection extends ResourceCollection
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
