<?php

namespace Modules\User\Http\Controllers\Permissions;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use App\Http\Controllers\ApiController;
use Spatie\Permission\Models\Permission;
use Modules\User\Http\Requests\StorePermissionRequest;
use Modules\User\Http\Requests\UpdatePermissionRequest;
use Modules\User\Transformers\Permissions\PermissionResource;
use Modules\User\Transformers\Permissions\PermissionCollection;

class PermissionController extends ApiController
{
     // Index
     public function index(Request $request)
     {
         //
         $limit = $request->query->get('limit') ?? 10;
         $offset = $request->query->get('offset') ?? 0;
         //
         $columns = [
             // Products
             AllowedFilter::exact('id'), 'name', 'created_at',
         ];
         //
         $permissions = QueryBuilder::for(Permission::class)
             //filtering
             ->allowedFilters($columns)
             //sorting
             ->defaultSort('id')
             ->allowedSorts([
                 'id', 'name', 'created_at',
             ])
             ->limit($limit)->offset($offset * $limit)
             ->get() ?? [];
         //
         return $this->showAll(new PermissionCollection($permissions), Response::HTTP_OK);
     }
     // Show
     public function show(Permission $permission)
     {
         //
         if ($permission) {
             //permission
             return $this->showOne($permission, Response::HTTP_OK);
         }
         //
         return $this->errorResponse(__('messages.recource_cannot_be_found'), Response::HTTP_NOT_FOUND);
     }
     // Store
     public function store(StorePermissionRequest $request)
     {
         $permission = Permission::create(['name' => $request->get('permission_name')]);
         return $this->successResponse(new PermissionResource($permission), Response::HTTP_CREATED);
     }


     // Update
     public function update(UpdatePermissionRequest $request, Permission $permission)
     {
         //
         if ($permission) {
             // name
             if (request()->has('permission_name')) {
                 $permission->name = $request->permission_name;
             }
             $permission->save();
             //
             return $this->successResponse(__('messages.updated_successfully'), Response::HTTP_NO_CONTENT);
         }
         //
         return $this->errorResponse(__('messages.recource_cannot_be_found'), Response::HTTP_NOT_FOUND);
     }
     // Destroy
     public function destroy(Permission $permission)
     {
         //
         if ($permission) {
             //
             if ($permission->delete()) {
                 //
                 return $this->successResponse(__('messages.deleted_successfully'), Response::HTTP_NO_CONTENT);
             }
             //
             return $this->errorResponse(__('messages.resource_cannot_be_deleted'), Response::HTTP_CONFLICT);
         }
         //
         return $this->errorResponse(__('messages.recource_cannot_be_found'), Response::HTTP_NOT_FOUND);
     }
}
