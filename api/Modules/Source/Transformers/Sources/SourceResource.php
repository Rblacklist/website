<?php

namespace Modules\Source\Transformers\Sources;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Source\Transformers\Types\TypeSourceResource;

class SourceResource extends JsonResource
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
            'name' => $this->name,
            'base_url' => $this->base_url,
            'status' => $this->status,
            'type_source' => new TypeSourceResource($this->typeSource),
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),

        ];
    }
}
