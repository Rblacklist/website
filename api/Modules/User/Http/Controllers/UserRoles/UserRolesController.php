<?php

namespace Modules\User\Http\Controllers\UserRoles;

use Illuminate\Http\Response;
use Modules\User\Entities\User;
use App\Http\Controllers\ApiController;
use Modules\User\Http\Requests\UserRolesRequest;

class UserRolesController extends ApiController
{
    public function setRolesForUser(UserRolesRequest $request, User $user)
    {
        $user->syncRoles($request->roles);
        return $this->successResponse($user, Response::HTTP_CREATED);
    }
}
