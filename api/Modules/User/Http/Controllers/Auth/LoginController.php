<?php

namespace Modules\User\Http\Controllers\Auth;

use Exception;
use Illuminate\Http\Response;
use Modules\User\Entities\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ApiController;
use Modules\User\Http\Requests\LoginRequest;
use Modules\User\Transformers\Users\UserResource;

class LoginController extends ApiController
{
    //
    public function login(LoginRequest $request)
    {

        try {
            //
            $phoneOrEmail = $request->input('phoneOrEmail');
            $password = $request->input('password');
            $credentials = [];

            //
            if (filter_var($phoneOrEmail, FILTER_VALIDATE_EMAIL)) {

                // Email verified or not
                if (User::where(
                    'email',
                    $request->input('phoneOrEmail'),
                )->whereNull('email_verified_at')->first()) {
                    return $this->showMessage("Please check your email for complete registration.", Response::HTTP_OK);
                }
                $request->validate(['phoneOrEmail' => ['required', 'email', 'exists:users,email']]);
                $credentials = ['email' => $phoneOrEmail, 'password' => $password];
            } else {

                // Phone verified or not
                if (User::where(
                    'phone',
                    $request->input('phoneOrEmail'),
                )->whereNull('phone_verified_at')->first()) {
                    return $this->showMessage("Please confirm your phone number .", Response::HTTP_OK);
                }

                $request->validate(['phoneOrEmail' => ['required', 'numeric', 'digits_between:10,15', 'exists:users,phone']]);
                $credentials = ['phone' => $phoneOrEmail, 'password' => $password];
            }

            //
            if (Auth::attempt($credentials)) {
                $user = Auth::user();
                $data = [
                    'message' => 'Success! you are logged in successfully',
                    'token' => $user->createToken('token')->plainTextToken,
                    'expiresIn' => config('sanctum.expiration'),
                    'data' => new UserResource($user),
                ];
                //
                return $this->successResponse($data, Response::HTTP_OK);
            }
            //
            return $this->errorResponse(trans('messages.unauthenticated'), Response::HTTP_UNAUTHORIZED);
        } catch (Exception $ex) {
            return $this->errorResponse($ex->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    //
    public function logout()
    {
        if (!Auth::guard('sanctum')->check()) {
            return $this->errorResponse(trans('messages.recource_cannot_be_found'), Response::HTTP_NOT_FOUND);
        }

        Auth::user()->tokens()->delete();

        return $this->showMessage(trans('messages.logout'), Response::HTTP_OK);
    }
}
