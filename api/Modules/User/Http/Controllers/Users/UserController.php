<?php

namespace Modules\User\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use Illuminate\Contracts\Support\Renderable;
use Modules\User\Transformers\Users\UserResource;

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

}
