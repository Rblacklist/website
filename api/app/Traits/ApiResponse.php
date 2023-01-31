<?php

namespace App\Traits;

use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;

trait ApiResponse
{
    //
    public function showAll(Collection $collection, $code = Response::HTTP_OK): JsonResponse
    {
        return $this->successResponse(['data' => $collection], $code);
    }

    //
    public function showOne($model, $code = Response::HTTP_OK): JsonResponse
    {
        return $this->successResponse(['data' => $model], $code);
    }

    //
    protected function successResponse($data, $code = Response::HTTP_OK): JsonResponse
    {
        return response()->json($data, $code);
    }

    //
    protected function errorResponse($message, $code = Response::HTTP_NOT_FOUND): JsonResponse
    {
        return response()->json(
            [
                'code' => $code,
                'status' => false,
                'error' => $message,
            ],
            $code
        );
    }

    //
    protected function showMessage($message, $code = Response::HTTP_OK): JsonResponse
    {
        return response()->json([
            'code' => $code,
            'status' => true,
            'message' => $message,
        ]);
    }
}
