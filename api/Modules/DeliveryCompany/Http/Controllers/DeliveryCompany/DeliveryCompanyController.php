<?php

namespace Modules\DeliveryCompany\Http\Controllers\DeliveryCompany;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use App\Http\Controllers\ApiController;
use Modules\DeliveryCompany\Entities\DeliveryCompany;
use Modules\DeliveryCompany\Transformers\DeliveryCompanyResource;
use Modules\DeliveryCompany\Transformers\DeliveryCompanyCollection;
use Modules\DeliveryCompany\Http\Requests\StoreDeliveryCompanyRequest;
use Modules\DeliveryCompany\Http\Requests\UpdateDeliveryCompanyRequest;

class DeliveryCompanyController extends ApiController
{

    public function __construct(){
        $this->middleware('role:super-admin');
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */

    public function index(Request $request) // {{domain}}/api/delivery-company (GET)
    {
        //
        $limit = $request->query->get('limit') ?? 10;
        $offset = $request->query->get('offset') ?? 0;
        //
        $columns = [
            // Deliveries
            AllowedFilter::exact('id'), 'name', 'api_secret', 'base_url',
            AllowedFilter::scope('status'), 'created_at',

        ];
        //
        $deliveryCompanies = QueryBuilder::for(DeliveryCompany::class)
            //filtering
            ->allowedFilters($columns)
            //sorting
            ->defaultSort('id')
            ->allowedSorts([
                // delivery Companies
                'id', 'name', 'api_secret', 'base_url',
                'status', 'created_at',
            ])
            ->limit($limit)->offset($offset * $limit)
            ->get() ?? [];
        //
        return $this->showAll(new DeliveryCompanyCollection($deliveryCompanies), Response::HTTP_OK);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show(DeliveryCompany $deliveryCompany) // {{domain}}/api/delivery-company/{delivery_company} (GET)
    {
        //
        if ($deliveryCompany) {
            //
            return $this->showAll(new DeliveryCompanyResource($deliveryCompany), Response::HTTP_OK);
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
        $deliveryCompanies = QueryBuilder::for(DeliveryCompany::class)
            ->allowedFields([
                'id', 'name', 'api_secret', 'base_url',
                'status', 'created_at',
            ])
            ->get();
        return $this->showAll($deliveryCompanies, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(StoreDeliveryCompanyRequest $request) // {{domain}}/api/delivery-company (POST)
    {
        //
        $deliveryCompany = DeliveryCompany::create($request->all());
        return $this->successResponse(new DeliveryCompanyResource($deliveryCompany), Response::HTTP_CREATED);
    }



    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(UpdateDeliveryCompanyRequest $request, DeliveryCompany $deliveryCompany) // {{domain}}/api/delivery-company/{delivery_company} (PUT)
    {
        //
        if ($deliveryCompany) {
            // name
            if (request()->has('name')) {
                $deliveryCompany->name = $request->name;
            }
            // base_url
            if (request()->has('base_url')) {
                $deliveryCompany->base_url = $request->base_url;
            }
            // api_secret
            if (request()->has('api_secret')) {
                $deliveryCompany->api_secret = $request->api_secret;
            }
            // Status
            if (request()->has('status')) {
                $deliveryCompany->status = $request->status;
            }
            //
            if (!$deliveryCompany->isDirty()) {
                return $this->errorResponse(__('messages.diff_value'), Response::HTTP_NOT_MODIFIED);
            }
            //
            $deliveryCompany->save();
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
    public function destroy(DeliveryCompany $deliveryCompany) // {{domain}}/api/delivery-company/{delivery_company} (DELETE)
    {
        //
        if ($deliveryCompany) {
            //
            if ($deliveryCompany->delete()) {
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
