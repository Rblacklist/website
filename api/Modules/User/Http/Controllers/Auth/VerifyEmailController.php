<?php

namespace Modules\User\Http\Controllers\Auth;

use Illuminate\Http\Response;
use App\Http\Controllers\ApiController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class VerifyEmailController extends ApiController
{

    public function verifyEmail(EmailVerificationRequest $request)
    {
        $request->fulfill();
        return $this->showMessage('Thank you, your email has been confirmed', Response::HTTP_OK);
    }
}
