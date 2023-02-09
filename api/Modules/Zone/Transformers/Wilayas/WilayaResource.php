<?php

namespace Modules\Zone\Transformers\Wilayas;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Zone\Transformers\Dairas\DairaCollection;

class WilayaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name_fr' => $this->name_fr,
            'name_ar' => $this->name_ar,
            'dairas' => new DairaCollection($this->daira),
        ];
    }
}
