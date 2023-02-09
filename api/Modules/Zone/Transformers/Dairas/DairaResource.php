<?php

namespace Modules\Zone\Transformers\Dairas;

use Illuminate\Http\Resources\Json\JsonResource;

class DairaResource extends JsonResource
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
        ];
    }
}
