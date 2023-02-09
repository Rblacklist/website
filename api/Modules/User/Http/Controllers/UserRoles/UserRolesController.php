<?php

namespace Modules\User\Http\Controllers\UserRoles;

use Illuminate\Http\Response;
use Modules\User\Entities\User;
use App\Http\Controllers\ApiController;
use Modules\User\Http\Requests\UserRolesRequest;
use Modules\User\Transformers\Users\UserResource;

class UserRolesController extends ApiController
{
    private $user;
    public function __construct()
    {
        $this->user = auth('sanctum')->user();
        $this->middleware('role:super-admin|admin');
    }

    public function setRolesForUser(UserRolesRequest $request, User $user)
    {
        if ($this->user->hasRole('super-admin')) {
            $user->syncRoles($request->roles);
        } elseif ($this->user->hasRole('admin')) {
            for ($i = 0; $i < count($request->roles); $i++) {
                if ($request->roles[$i] == 3 || $request->roles[$i] == 4) {
                    $user->syncRoles($request->roles);
                } else {
                    return $this->errorResponse('UNAUTHORIZED', Response::HTTP_UNAUTHORIZED);
                }
            }
        } else {
            return $this->errorResponse('UNAUTHORIZED', Response::HTTP_UNAUTHORIZED);
        }
        return $this->successResponse(new UserResource($user), Response::HTTP_CREATED);
    }
}
