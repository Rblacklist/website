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
            'firstname' => (string) $this->firstname,
            'lastname' => (string) $this->lastname,
            'code' => (string) $this->code,
            'email' => (string) $this->email,
            'phone' => (string) $this->phone,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
        ];
    }
}
