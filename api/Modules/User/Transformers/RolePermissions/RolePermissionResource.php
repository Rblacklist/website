<?php

namespace Modules\User\Transformers\RolePermissions;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\User\Transformers\Permissions\PermissionCollection;

class RolePermissionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'id' => $this->id ?? '',
            'name' => $this->name ?? '',
            'permissions' => new PermissionCollection($this->permissions),
            'created_at' => $this->created_at->format('Y-m-d H:i:s') ?? '',
        ];
    }
}
