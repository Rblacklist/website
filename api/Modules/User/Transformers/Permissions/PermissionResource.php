<?php

namespace Modules\User\Transformers\Permissions;

use Illuminate\Http\Resources\Json\JsonResource;

class PermissionResource extends JsonResource
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
            'id' => $this->id ?? '',
            'name' => $this->name ?? '',
            'created_at' => $this->created_at->format('Y-m-d H:i:s') ?? '',
        ];
    }
}
