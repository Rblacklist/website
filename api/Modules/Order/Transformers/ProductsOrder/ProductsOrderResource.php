<?php

namespace Modules\Order\Transformers\ProductsOrder;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Product\Transformers\Products\ProductResource;
use Modules\Product\Transformers\Products\ProductCollection;
use PhpParser\Node\Expr\Cast\Double;

class ProductsOrderResource extends JsonResource
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
            'products' => new ProductResource($this->product),
            'quantity' => (int) $this->quantity,
            'price' => (float) $this->price,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
        ];
    }
}
