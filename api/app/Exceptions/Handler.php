<?php

namespace App\Exceptions;

use Throwable;
use Exception;
use ReflectionException;
use App\Traits\ApiResponse;
use Asm89\Stack\CorsService;
use Illuminate\Database\QueryException;
use Illuminate\Auth\AuthenticationException;
use Carbon\Exceptions\InvalidFormatException;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;


class Handler extends ExceptionHandler
{
    use ApiResponse;
    protected $dontReport = [
        //
    ];
    protected $dontFlash = [
        'password',
    ];

    public function render($request, Throwable $exception)
    {
        if ($request->is('api/*')) {
            $response = $this->ApiHandleException($request, $exception);
            app(CorsService::class)->addActualRequestHeaders($response, $request);
            return $response;
        } else {
            $retval = parent::render($request, $exception);
        }
        return $retval;
    }

    protected function ApiHandleException($request, Throwable $exception)
    {
        if ($exception instanceof InvalidFormatException) {
            $errors = $exception->getMessage();
            return $this->errorResponse($errors, 422);
        }
        if ($exception instanceof ReflectionException) {
            $errors = $exception->getMessage();
            return $this->errorResponse($errors, 422);
        }
        if ($exception instanceof ValidationException) {
            return $this->convertValidationExceptionToResponse($exception, $request);
        }

        if ($exception instanceof ModelNotFoundException) {
            $modelName = strtolower(class_basename($exception->getModel()));
            return $this->errorResponse(trans('messages.not_found') . ' ' . $modelName, 404);
        }

        if ($exception instanceof AuthenticationException) {
            return $this->unauthenticated($request, $exception);
        }

        if ($exception instanceof AuthorizationException) {
            return $this->errorResponse($exception->getMessage(), 403);
        }

        if ($exception instanceof NotFoundHttpException) {
            return $this->errorResponse(trans('messages.not_found'), 404);
        }

        if ($exception instanceof MethodNotAllowedHttpException) {
            return $this->errorResponse(trans('messages.method_is_invalid'), 405);
        }

        if ($exception instanceof HttpException) {
            return $this->errorResponse($exception->getMessage(), $exception->getStatusCode());
        }

        if ($exception instanceof QueryException) {
            $errorCode = $exception->errorInfo[1];

            if ($errorCode == 1451) {
                return $this->errorResponse(trans('messages.resource_cannot_be_removed'), 409);
            }
            if ($errorCode == 1062) {
                return $this->errorResponse(trans('messages.resource_error'), 409);
            }
            if ($errorCode == 1048) {
                return $this->errorResponse(trans('messages.empty_value'), 409);
            }
        }

        if ($exception instanceof Exception) {
            $errors = $exception->getMessage();
            return $this->errorResponse($errors, 422);
        }

        if (!config('app.debug')) {
            return $this->errorResponse(trans('messages.unexpected_exception'), 500);
        }
        return parent::render($request, $exception);
    }

    protected function convertValidationExceptionToResponse(ValidationException $e, $request)
    {
        return $this->errorResponse($e->validator->errors()->getMessages(), 422);
    }


    protected function unauthenticated($request, AuthenticationException $exception)
    {

        return $this->errorResponse(trans('messages.unauthenticated'), 401);

    }
}
