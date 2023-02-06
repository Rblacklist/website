<?php

namespace Modules\Apis\Http\Controllers\ApiShops;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Apis\Entities\ApiShops;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use App\Http\Controllers\ApiController;
use Modules\Apis\Transformers\ApiShops\ApiShopResource;
use Modules\Apis\Http\Requests\ApiShops\StoreApiShopRequest;
use Modules\Apis\Http\Requests\ApiShops\UpdateApiShopRequest;

class ApiShopController extends ApiController
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
            // ApiShops
            AllowedFilter::exact('id'), 'name', 'key_id', 'key_secret', 'status',
            'created_at', 'updated_at',
        ];

        $apiShops = QueryBuilder::for(ApiShops::class)
            //filtering
            ->allowedFilters($columns)
            //sorting
            ->defaultSort('id') //default
            ->allowedSorts([
                // ApiShops
                'id', 'name', 'key_id', 'key_secret', 'status',
                'created_at', 'updated_at',
            ])
            ->limit($limit)->offset($offset * $limit)
            ->get() ?? [];
        //
        return $this->showAll($apiShops, Response::HTTP_OK);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function selectingFields()
    {
        $apiShops = QueryBuilder::for(ApiShops::class)
            ->allowedFields([
                'id', 'name', 'key_id', 'key_secret', 'status',
                'created_at', 'updated_at',
            ])
            ->get();
        return $this->showAll($apiShops, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     * @param StoreApiShopRequest $request
     * @return Response
     */
    public function store(StoreApiShopRequest $request)
    {
        //
        $apiShop = ApiShops::create($request->all());
        return $this->successResponse(new ApiShopResource($apiShop), Response::HTTP_CREATED);
    }

    /**
     * Show the specified resource.
     * @param ApiShops $apiShops
     * @return Response
     */
    public function show(ApiShops $apiShops)
    {
        //
        if ($apiShops) {
            //
            return $this->showOne(new ApiShopResource($apiShops), Response::HTTP_OK);
        }
        //
        return $this->errorResponse(__('messages.recource_cannot_be_found'), Response::HTTP_NOT_FOUND);
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateApiShopRequest $request
     * @param ApiShops $apiShops
     * @return Response
     */
    public function update(UpdateApiShopRequest $request, ApiShops $apiShops)
    {
        //
        if ($apiShops) {
            // name
            if (request()->has('name')) {
                $apiShops->name = $request->name;
            }
            // Key Id
            if (request()->has('key_id')) {
                $apiShops->key_id = $request->key_id;
            }
            // Key Secret
            if (request()->has('key_secret')) {
                $apiShops->key_secret = $request->key_secret;
            }
            // Status
            if (request()->has('status')) {
                $apiShops->status = $request->status;
            }
            //
            if (!$apiShops->isDirty()) {
                return $this->errorResponse(__('messages.diff_value'), Response::HTTP_NOT_MODIFIED);
            }

            //
            $apiShops->save();

            //
            return $this->successResponse(__('messages.updated_successfully'), Response::HTTP_NO_CONTENT);
        }
        //
        return $this->errorResponse(__('messages.recource_cannot_be_found'), Response::HTTP_NOT_FOUND);
    }

    /**
     * Remove the specified resource from storage.
     * @param ApiShops $apiShops
     * @return Response
     */
    public function destroy(ApiShops $apiShops)
    {
        if ($apiShops) {
            //
            if ($apiShops->delete()) {
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
