<?php

namespace Modules\User\Http\Controllers\Auth;

use Illuminate\Support\Str;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Modules\User\Http\Requests\ResetPasswordRequest;

class ResetPasswordController extends ApiController
{
    //
    public function resetPassword(ResetPasswordRequest $request)
    {
        $status = Password::reset(
            $request->only('email', 'password', 'passwordConfirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();
                event(new PasswordReset($user));
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            return  $this->successResponse(['status' => __($status)], Response::HTTP_OK);
        } else {
            return $this->errorResponse(['email' => [__($status)]], Response::HTTP_NOT_FOUND);
        }
    }
}
