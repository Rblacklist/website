<?php

namespace Modules\User\Transformers\UserRoles;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UserRoleCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return $this->collection;
    }
}
