<?php

namespace Modules\Apis\Transformers\ApiDeliveries;

use Illuminate\Http\Resources\Json\JsonResource;

class ApiDeliveryResource extends JsonResource
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
            'key_id' => $this->key_id,
            'key_secret' => $this->key_secret,
            'status' => $this->status,
            'created_at' => $this->created_at,
        ];
    }
}
