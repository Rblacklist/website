<?php

namespace Modules\User\Transformers\Users;

use DateTime;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\User\Transformers\Roles\RoleCollection;

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
            'id' => (int) $this->id,
            'firstname' => (string) $this->firstname,
            'lastname' => (string) $this->lastname,
            'code' => (string) $this->code,
            'email' => (string) $this->email,
            'phone' => (string) $this->phone,
            'roles'  => new RoleCollection($this->roles),
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
        ];
    }
}
