<?php

namespace Modules\User\Transformers\UserRoles;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\User\Transformers\Roles\RoleCollection;

class UserRoleResource extends JsonResource
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
            'firstname' => $this->firstname ?? '',
            'lastname' => $this->lastname ?? '',
            'email' => $this->email ?? '',
            'code' => $this->code ?? '',
            'phone' => $this->phone ?? '',
            'roles' => new RoleCollection($this->roles),
            'created_at' => $this->created_at->format('Y-m-d H:i:s') ?? '',
        ];
    }
}
