<?php

namespace Modules\User\Http\Controllers\RolePermissions;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\ApiController;
use Modules\User\Http\Requests\RolePermissionsRequest;
use Modules\User\Transformers\RolePermissions\RolePermissionResource;

class RolePermissionsController extends ApiController
{
    public function setPermissionsForRole(RolePermissionsRequest $request, Role $role)
    {
        $role->syncPermissions($request->permissions);
        return $this->successResponse(new RolePermissionResource($role), Response::HTTP_CREATED);
    }
}
