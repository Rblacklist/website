<?php

namespace Modules\User\Http\Controllers\Roles;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\User\Entities\User;
use Spatie\Permission\Models\Role;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use App\Http\Controllers\ApiController;
use Modules\User\Http\Requests\StoreRoleRequest;
use Modules\User\Http\Requests\UpdateRoleRequest;
use Modules\User\Transformers\Roles\RoleCollection;
use Modules\User\Transformers\Roles\RoleResource;

class RoleController extends ApiController
{

    private $user;
    public function __construct()
    {
        $this->user = auth('sanctum')->user();
        $this->middleware('role:super-admin|admin');
    }

    // Index
    public function index(Request $request)
    {
        //
        $limit = $request->query->get('limit') ?? 10;
        $offset = $request->query->get('offset') ?? 0;
        //
        $columns = [
            AllowedFilter::exact('id'), 'name', 'created_at', 'updated_at',
        ];

        //
        if ($this->user->hasRole('super-admin')) { // Super-admin
            $roles = QueryBuilder::for(Role::class)
                //filtering
                ->allowedFilters($columns)
                //sorting
                ->defaultSort('id')
                ->allowedSorts([
                    // Products
                    'id', 'name', 'created_at', 'updated_at',
                ])
                ->limit($limit)->offset($offset * $limit)
                ->get() ?? [];
        } elseif ($this->user->hasRole('admin')) {  // Admin
            $roles = QueryBuilder::for(Role::class)
                //filtering
                ->allowedFilters($columns)
                //sorting
                ->defaultSort('id')
                ->allowedSorts([
                    // Products
                    'id', 'name', 'created_at', 'updated_at',
                ])
                ->limit($limit)->offset($offset * $limit)
                ->whereIn('name', ['manager', 'member'])->get() ?? [];
        }

        //
        return $this->showAll(new RoleCollection($roles), Response::HTTP_OK);
    }

    // Show
    public function show(Role $role)
    {
        //
        if ($role) {
            //
            return $this->showOne($role, Response::HTTP_OK);
        }
        //
        return $this->errorResponse(__('messages.recource_cannot_be_found'), Response::HTTP_NOT_FOUND);
    }

    // Store
    public function store(StoreRoleRequest $request)
    {

        if ($this->user->hasRole('super-admin')) {
            $role = Role::create(['name' => $request->get('role_name')]);
            return $this->successResponse(new RoleResource($role), Response::HTTP_CREATED);
        } else {
            return $this->errorResponse('UNAUTHORIZED', Response::HTTP_UNAUTHORIZED);
        }
    }

    // Get Role by user
    public function getRolesByUser(User $user)
    {
        try {
            if (!empty($userId)) {
                $roles = $user->getRoleNames();
                return $this->successResponse([
                    'user' => $user,
                    'roles' => $roles
                ], Response::HTTP_OK);
            }
            return $this->errorResponse(trans('messages.resource_cannot_be_found_in_database'), Response::HTTP_NOT_FOUND);
        } catch (Exception $ex) {
            return $this->errorResponse($ex->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


    // User has role
    public function userHasRole(User $user, Role $role)
    {
        try {
            $hasRole = $user->hasRole($role->name);
            return $this->successResponse(['has_role ' => $hasRole], Response::HTTP_OK);
        } catch (Exception $ex) {
            return $this->errorResponse($ex->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


    // Update
    public function update(UpdateRoleRequest $request, Role $role)
    {
        //
        if ($this->user->hasRole('super-admin')) {
            // name
            if (request()->has('role_name')) {
                $role->name = $request->role_name;
            }
            $role->save();
            //
            return $this->successResponse(__('messages.updated_successfully'), Response::HTTP_NO_CONTENT);
        } else {
            return $this->errorResponse('UNAUTHORIZED', Response::HTTP_UNAUTHORIZED);
        }
    }


    // Destroy
    public function destroy(Role $role)
    {
        //
        if ($this->user->hasRole('super-admin')) {
            if ($role) {
                //
                if ($role->delete()) {
                    //
                    return $this->successResponse(__('messages.deleted_successfully'), Response::HTTP_NO_CONTENT);
                }
                //
                return $this->errorResponse(__('messages.resource_cannot_be_deleted'), Response::HTTP_CONFLICT);
            }
            //
            return $this->errorResponse(__('messages.recource_cannot_be_found'), Response::HTTP_NOT_FOUND);
        } else {
            return $this->errorResponse('UNAUTHORIZED', Response::HTTP_UNAUTHORIZED);
        }
    }
}
