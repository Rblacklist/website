<?php

namespace Modules\Order\Transformers\ProductsOrder;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductsOrderCollection extends ResourceCollection
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
