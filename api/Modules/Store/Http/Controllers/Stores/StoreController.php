<?php

namespace Modules\Store\Http\Controllers\Stores;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Store\Entities\Store;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use App\Http\Controllers\ApiController;
use Modules\Store\Transformers\StoreResource;
use Modules\Store\Http\Requests\StStoreRequest;
use Modules\Store\Transformers\StoreCollection;
use Modules\Store\Http\Requests\UpdateStoreRequest;

class StoreController extends ApiController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */

    public function index(Request $request) // {{domain}}/api/stores (GET)
    {
        //
        $limit = $request->query->get('limit') ?? 10;
        $offset = $request->query->get('offset') ?? 0;
        //
        $columns = [
            // Stores
            AllowedFilter::exact('id'), 'name', 'base_url',
            AllowedFilter::scope('status'), 'created_at',
        ];
        //
        $stores = QueryBuilder::for(Store::class)
            //filtering
            ->allowedFilters($columns)
            //sorting
            ->defaultSort('id')
            ->allowedSorts([
                // Stores
                'id', 'name', 'base_url', 'status', 'created_at',
            ])
            ->limit($limit)->offset($offset * $limit)
            ->get() ?? [];
        //
        return $this->showAll(new StoreCollection($stores), Response::HTTP_OK);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show(Store $store) // {{domain}}/api/stores/{store} (GET)
    {
        //
        if ($store) {
            //
            return $this->showAll(new StoreResource($store), Response::HTTP_OK);
        }
        //
        return $this->errorResponse(__('messages.recource_cannot_be_found'), Response::HTTP_NOT_FOUND);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function selectingFields()
    {
        $stores = QueryBuilder::for(Store::class)
            ->allowedFields(['id', 'name', 'base_url', 'status', 'created_at',])
            ->get();
        return $this->showAll($stores, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(StStoreRequest $request) // {{domain}}/api/stores (POST)
    {
        //
        $store = Store::create($request->all());
        return $this->successResponse(new StoreResource($store), Response::HTTP_CREATED);
    }



    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(UpdateStoreRequest $request, Store $store) // {{domain}}/api/stores/{store} (PUT)
    {
        //
        if ($store) {
            // name
            if (request()->has('name')) {
                $store->name = $request->name;
            }
            // base_url
            if (request()->has('base_url')) {
                $store->base_url = $request->base_url;
            }
            // status
            if (request()->has('status')) {
                $store->status = $request->status;
            }
            //
            if (!$store->isDirty()) {
                return $this->errorResponse(__('messages.diff_value'), Response::HTTP_NOT_MODIFIED);
            }
            //
            $store->save();
            //
            return $this->successResponse(__('messages.updated_successfully'), Response::HTTP_NO_CONTENT);
        }
        //
        return $this->errorResponse(__('messages.recource_cannot_be_found'), Response::HTTP_NOT_FOUND);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy(Store $store) // {{domain}}/api/stores/{store} (DELETE)
    {
        //
        if ($store) {
            //
            if ($store->delete()) {
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
