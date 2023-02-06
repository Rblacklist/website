<?php

namespace Modules\User\Http\Controllers\Users;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\User\Entities\User;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use App\Http\Controllers\ApiController;
use Illuminate\Contracts\Support\Renderable;
use Modules\User\Http\Requests\StoreUserRequest;
use Modules\User\Http\Requests\UpdateUserRequest;
use Modules\User\Transformers\Users\UserResource;
use Modules\User\Transformers\Users\UserCollection;

class UserController extends ApiController
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function getInfoUser(Request $request)
    {
        return $this->showOne(new UserResource($request->user()));
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */

    public function index(Request $request) // {{domain}}/api/users (GET)
    {
        //
        $limit = $request->query->get('limit') ?? 10;
        $offset = $request->query->get('offset') ?? 0;
        //
        $columns = [
            // users
            AllowedFilter::exact('id'), 'firstname', 'lastname', 'email',
            'code', 'email_verifed_at', 'phone_verified_at', 'phone',
            AllowedFilter::scope('status'), 'created_at',
        ];
        //
        $users = QueryBuilder::for(User::class)
            //filtering
            ->allowedFilters($columns)
            //sorting
            ->defaultSort('id')
            ->allowedSorts([
                // users
                AllowedFilter::exact('id'), 'firstname', 'lastname', 'email',
                'code', 'phone', AllowedFilter::scope('status'), 'created_at',
            ])
            ->limit($limit)->offset($offset * $limit)
            ->get() ?? [];
        //
        return $this->showAll(new UserCollection($users), Response::HTTP_OK);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show(User $user) // {{domain}}/api/users/{user} (GET)
    {
        //
        if ($user) {
            //
            return $this->showAll(new UserResource($user), Response::HTTP_OK);
        }
        //
        return $this->errorResponse(__('messages.recource_cannot_be_found'), Response::HTTP_NOT_FOUND);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function selectingFields()
    {
        $users = QueryBuilder::for(User::class)
            ->allowedFields([
                'id', 'firstname', 'lastname', 'email',
                'code', 'phone', 'status', 'created_at',
            ])
            ->get();
        return $this->showAll($users, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(StoreUserRequest $request) // {{domain}}/api/users (POST)
    {
        //
        $user = User::create($request->all());
        return $this->successResponse(new UserResource($user), Response::HTTP_CREATED);
    }



    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(UpdateUserRequest $request, User $user) // {{domain}}/api/users/{user} (PUT)
    {
        //
        if ($user) {
            // firstname
            if (request()->has('firstname')) {
                $user->firstname = $request->firstname;
            }
            // lastname
            if (request()->has('lastname')) {
                $user->lastname = $request->lastname;
            }
            // code
            if (request()->has('code')) {
                $user->code = $request->code;
            }
            // phone
            if (request()->has('phone')) {
                $user->phone = $request->phone;
            }
            // Email
            if (request()->has('email')) {
                $user->email = $request->email;
            }
            // email_verified_at
            if (request()->has('email_verified_at')) {
                $user->email_verified_at = $request->email_verified_at;
            }
            // phone_verified_at
            if (request()->has('phone_verified_at')) {
                $user->phone_verified_at = $request->phone_verified_at;
            }
            //
            if (!$user->isDirty()) {
                return $this->errorResponse(__('messages.diff_value'), Response::HTTP_NOT_MODIFIED);
            }
            //
            $user->save();
            //
            return $this->successResponse(__('messages.updated_successfully'), Response::HTTP_NO_CONTENT);
        }
        //
        return $this->errorResponse(__('messages.recource_cannot_be_found'), Response::HTTP_NOT_FOUND);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy(User $user) // {{domain}}/api/users/{user} (DELETE)
    {
        //
        if ($user) {
            //
            if ($user->delete()) {
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
