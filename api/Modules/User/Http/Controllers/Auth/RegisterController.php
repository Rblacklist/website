<?php

namespace Modules\User\Http\Controllers\Auth;

use Exception;
use Illuminate\Http\Response;
use Modules\User\Entities\User;
use Illuminate\Auth\Events\Registered;
use App\Http\Controllers\ApiController;
use Modules\User\Http\Requests\RegisterRequest;
use Modules\User\Transformers\Users\UserResource;

class RegisterController extends ApiController
{
    //
    public function register(RegisterRequest $request)
    {
        try {
            $dataUser = [
                'firstname' => $request->input('firstName'),
                'lastname' => $request->input('lastName'),
                'email' => $request->input('email'),
                'code' => $request->input('code'), // ex: +213
                'phone' => $request->input('phone'),
                'password' => bcrypt($request->input('password'))
            ];

            $user = User::create($dataUser);

            //
            if ($user) {
                // Token
                $data['id'] = $user->id;
                $data['token'] = $user->createToken('token')->plainTextToken;
                if (filter_var($request->input('email'), FILTER_VALIDATE_EMAIL)) { // email
                    $data['message'] = "Please check your email for complete registration.";
                    event(new Registered($user));
                }
                return $this->successResponse($data, Response::HTTP_CREATED);
            } else {
                return $this->errorResponse(trans('messages.resource_cannot_be_created'), Response::HTTP_NOT_FOUND);
            }
        } catch (Exception $ex) {
            return $this->errorResponse($ex->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
