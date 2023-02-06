<?php

namespace Modules\Order\Http\Controllers\Status;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use App\Http\Controllers\ApiController;
use Modules\Order\Entities\StatusOrder;
use Modules\Order\Transformers\StatusOrders\StatusOrderResource;
use Modules\Order\Transformers\StatusOrders\StatusOrderCollection;
use Modules\Source\Http\Requests\TypeSource\StoreTypeSourceRequest;
use Modules\Order\Http\Requests\StatusOrders\UpdateStatusOrderRequest;

class StatusController extends ApiController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */

    public function index(Request $request) // {{domain}}/api/status-orders (GET)
    {
        //
        $limit = $request->query->get('limit') ?? 10;
        $offset = $request->query->get('offset') ?? 0;
        //
        $columns = [
            // Sources
            AllowedFilter::exact('id'), 'name',
            AllowedFilter::scope('status'), 'created_at',
        ];
        //
        $typeSource = QueryBuilder::for(StatusOrder::class)
            //filtering
            ->allowedFilters($columns)
            //sorting
            ->defaultSort('id')
            ->allowedSorts([
                // Sources
                'id', 'name', 'status', 'created_at',
            ])
            ->limit($limit)->offset($offset * $limit)
            ->get() ?? [];
        //
        return $this->showAll(new StatusOrderCollection($typeSource), Response::HTTP_OK);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show(StatusOrder $statusOrder) // {{domain}}/api/status-orders/{status_order} (GET)
    {
        //
        if ($statusOrder) {
            //
            return $this->showOne(new StatusOrderResource($statusOrder), Response::HTTP_OK);
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
        $typeSource = QueryBuilder::for(TypeSource::class)
            ->allowedFields(['id', 'name', 'status', 'created_at', 'updated_at'])
            ->get();
        return $this->showAll($typeSource, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(StoreTypeSourceRequest $request) // {{domain}}/api/status-orders (POST)
    {
        //
        $statusOrder = StatusOrder::create($request->all());
        return $this->successResponse(new StatusOrderResource($statusOrder), Response::HTTP_CREATED);
    }



    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(UpdateStatusOrderRequest $request, StatusOrder $statusOrder) // {{domain}}/api/status-orders/{status_order} (PUT)
    {
        //
        if ($statusOrder) {
            // name
            if (request()->has('name')) {
                $statusOrder->name = $request->name;
            }
            // status
            if (request()->has('status')) {
                $statusOrder->status = $request->status;
            }
            //
            if (!$statusOrder->isDirty()) {
                return $this->errorResponse(__('messages.diff_value'), Response::HTTP_NOT_MODIFIED);
            }
            //
            $statusOrder->save();
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
    public function destroy(StatusOrder $statusOrder) // {{domain}}/api/status-orders/{status_order} (DELETE)
    {
        //
        if ($statusOrder) {
            //
            if ($statusOrder->delete()) {
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
