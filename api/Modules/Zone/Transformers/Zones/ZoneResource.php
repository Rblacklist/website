<?php

namespace Modules\Zone\Transformers\Zones;

use Illuminate\Http\Resources\Json\JsonResource;

class ZoneResource extends JsonResource
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
            'zone_name' => $this->zone_name,
            'regions' => $this->regions,
        ];
    }
}
