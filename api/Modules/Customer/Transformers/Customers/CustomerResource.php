<?php

namespace Modules\Customer\Transformers\Customers;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Customer\Transformers\Phones\PhoneCollection;

class CustomerResource extends JsonResource
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
            'fullname' => $this->fullname ?? '',
            'phones' => new PhoneCollection($this->phones) ?? [],
            'address' => $this->address ?? '',
            'city' => $this->city ?? '',
            'state' => $this->state ?? '',
            'created_at' => $this->created_at->format('Y-m-d H:i:s') ?? '',
        ];
    }
}
