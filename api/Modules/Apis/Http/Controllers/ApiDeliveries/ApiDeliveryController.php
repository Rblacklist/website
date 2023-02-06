<?php

namespace Modules\Apis\Http\Controllers\ApiDeliveries;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\QueryBuilder\QueryBuilder;
use Modules\Apis\Entities\ApiDelivery;
use Spatie\QueryBuilder\AllowedFilter;
use App\Http\Controllers\ApiController;
use Modules\Apis\Transformers\ApiDeliveries\ApiDeliveryResource;
use Modules\Apis\Http\Requests\ApiDelieries\StoreApiDeliveryRequest;
use Modules\Apis\Http\Requests\ApiDelieries\UpdateApiDeliveryRequest;

class ApiDeliveryController extends ApiController
{
    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        //
        $limit = $request->query->get('limit') ?? 10;
        $offset = $request->query->get('offset') ?? 0;
        //
        $columns = [
            // ApiDelivery
            AllowedFilter::exact('id'), 'name', 'key_id', 'key_secret', 'status',
            'created_at', 'updated_at',
        ];

        $apiDeliveries = QueryBuilder::for(ApiDelivery::class)
            //filtering
            ->allowedFilters($columns)
            //sorting
            ->defaultSort('id') //default
            ->allowedSorts([
                // ApiDelivery
                'id', 'name', 'key_id', 'key_secret', 'status',
                'created_at', 'updated_at',
            ])
            ->limit($limit)->offset($offset * $limit)
            ->get() ?? [];
        //
        return $this->showAll($apiDeliveries, Response::HTTP_OK);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function selectingFields()
    {
        $apiDelivery = QueryBuilder::for(ApiDelivery::class)
            ->allowedFields([
                'id', 'name', 'key_id', 'key_secret', 'status',
                'created_at', 'updated_at',
            ])
            ->get();
        return $this->showAll($apiDelivery, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     * @param StoreApiDeliveryRequest $request
     * @return Response
     */
    public function store(StoreApiDeliveryRequest $request)
    {
        //
        $apiDelivery = ApiDelivery::create($request->all());
        return $this->successResponse(new ApiDeliveryResource($apiDelivery), Response::HTTP_CREATED);
    }

    /**
     * Show the specified resource.
     * @param ApiDelivery $apiDelivery
     * @return Response
     */
    public function show(ApiDelivery $apiDelivery)
    {
        //
        if ($apiDelivery) {
            //
            return $this->showOne(new ApiDeliveryResource($apiDelivery), Response::HTTP_OK);
        }
        //
        return $this->errorResponse(__('messages.recource_cannot_be_found'), Response::HTTP_NOT_FOUND);
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateApiDeliveryRequest $request
     * @param ApiDelivery $apiDelivery
     * @return Response
     */
    public function update(UpdateApiDeliveryRequest $request, ApiDelivery $apiDelivery)
    {
        //
        if ($apiDelivery) {
            // name
            if (request()->has('name')) {
                $apiDelivery->name = $request->name;
            }
            // Key Id
            if (request()->has('key_id')) {
                $apiDelivery->key_id = $request->key_id;
            }
            // Key Secret
            if (request()->has('key_secret')) {
                $apiDelivery->key_secret = $request->key_secret;
            }
            // Status
            if (request()->has('status')) {
                $apiDelivery->status = $request->status;
            }
            //
            if (!$apiDelivery->isDirty()) {
                return $this->errorResponse(__('messages.diff_value'), Response::HTTP_NOT_MODIFIED);
            }

            //
            $apiDelivery->save();

            //
            return $this->successResponse(__('messages.updated_successfully'), Response::HTTP_NO_CONTENT);
        }
        //
        return $this->errorResponse(__('messages.recource_cannot_be_found'), Response::HTTP_NOT_FOUND);
    }

    /**
     * Remove the specified resource from storage.
     * @param ApiDelivery $apiDelivery
     * @return Response
     */
    public function destroy(ApiDelivery $apiDelivery)
    {
        if ($apiDelivery) {
            //
            if ($apiDelivery->delete()) {
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
