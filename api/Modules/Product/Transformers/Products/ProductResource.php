<?php

namespace Modules\Product\Transformers\Products;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'name' => $this->name ?? '',
            'price' => $this->price ?? '',
            'quantity' => $this->quantity ?? '',
            'weight' => $this->weight ?? '',
            'created_at' => $this->created_at->format('Y-m-d H:i:s') ?? '',
        ];
    }
}
