<?php

namespace Modules\DeliveryCompany\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class DeliveryCompanyResource extends JsonResource
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
            'api_secret' => $this->api_secret,
            'created_at' => $this->created_at->format('Y-m-d H:i:s') ?? '',
        ];
    }
}
