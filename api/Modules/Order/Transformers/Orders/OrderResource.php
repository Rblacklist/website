<?php

namespace Modules\Order\Transformers\Orders;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Source\Transformers\Sources\SourceResource;
use Modules\Customer\Transformers\Customers\CustomerResource;
use Modules\Order\Transformers\StatusOrders\StatusOrderResource;
use Modules\DeliveryCompany\Transformers\DeliveryCompanyResource;
use Modules\Order\Transformers\ProductsOrder\ProductsOrderCollection;

class OrderResource extends JsonResource
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
            'order_number' => $this->order_number,
            'delivery_type' => $this->delivery_type,
            'date' => $this->created_at->format('Y-m-d H:i:s'),
            'note' => $this->note,
            'is_sent' => $this->is_sent,
            'source' => new SourceResource($this->source),
            'customer' => new CustomerResource($this->customer),
            'products_order' => new ProductsOrderCollection($this->productsOrder),
            'delivery_company' => new DeliveryCompanyResource($this->deliveryCompany),
            'status_order' => new StatusOrderResource($this->statusOrder),
        ];
    }
}
