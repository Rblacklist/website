<?php

namespace Modules\User\Transformers\Users;

use DateTime;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'userId' => (int) $this->id,
            'firstName' => (string) $this->first_name,
            'lastName' => (string) $this->last_name,
            'code' => (string) $this->code,
            'email' => (string) $this->email,
            'phone' => (string) $this->phone,
            'createdAt' => $this->created_at->format('Y-m-d H:i:s'),

        ];
    }
}
