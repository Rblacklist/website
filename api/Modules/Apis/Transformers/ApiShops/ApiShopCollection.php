<?php

namespace Modules\Apis\Transformers\ApiShops;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ApiShopCollection extends ResourceCollection
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
