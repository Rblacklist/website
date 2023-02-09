<?php

namespace Modules\Zone\Transformers\Wilayas;

use Illuminate\Http\Resources\Json\ResourceCollection;

class WilayaCollection extends ResourceCollection
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
