<?php

namespace Modules\User\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends ApiController
{
    //
    public function forgotPassword(Request $request)
    {
        $request->validate(['email' => ['required', 'email', 'exists:users,email']]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status === Password::RESET_LINK_SENT) {
            return $this->successResponse(['status' => __($status)], Response::HTTP_OK);
        } else {
            return $this->errorResponse(['email' => __($status)], Response::HTTP_NOT_FOUND);
        }
    }
}
