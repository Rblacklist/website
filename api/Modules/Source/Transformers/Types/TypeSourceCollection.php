<?php

namespace Modules\Source\Transformers\Types;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TypeSourceCollection extends ResourceCollection
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
