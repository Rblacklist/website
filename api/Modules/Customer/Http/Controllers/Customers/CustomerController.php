<?php

namespace Modules\Customer\Http\Controllers\Customers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Customer\Entities\Customer;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use App\Http\Controllers\ApiController;
use Modules\Customer\Http\Requests\StoreCustomerRequest;
use Modules\Customer\Http\Requests\UpdateCustomerRequest;
use Modules\Customer\Transformers\Customers\CustomerResource;
use Modules\Customer\Transformers\Customers\CustomerCollection;

class CustomerController extends ApiController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */

    public function index(Request $request) // {{domain}}/api/customers (GET)
    {
        //
        $limit = $request->query->get('limit') ?? 10;
        $offset = $request->query->get('offset') ?? 0;
        //
        $columns = [
            // Customers
            AllowedFilter::exact('id'), 'fullname', 'address', 'city',
            'state', AllowedFilter::scope('status'), 'created_at',
            // Phones
            'phones.code', 'phones.phone'
        ];
        //
        $customers = QueryBuilder::for(Customer::class)
            //filtering
            ->allowedFilters($columns)
            //sorting
            ->defaultSort('id')
            ->allowedSorts([
                // Customers
                'id', 'fullname', 'address', 'city',
                'state', 'created_at',
                // Phones
                'phones.code', 'phones.phone'
            ])
            ->limit($limit)->offset($offset * $limit)
            ->get() ?? [];
        //
        return $this->showAll(new CustomerCollection($customers), Response::HTTP_OK);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show(Customer $customer) // {{domain}}/api/customers/{customer} (GET)
    {
        //
        if ($customer) {
            //
            return $this->showOne(new CustomerResource($customer), Response::HTTP_OK);
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
        $customers = QueryBuilder::for(Customer::class)
            ->allowedFields(['id', 'fullname', 'address', 'city', 'state', 'status'])
            ->allowedIncludes('phones')
            ->get();
        return $this->showAll($customers, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(StoreCustomerRequest $request) // {{domain}}/api/customers (POST)
    {
        //
        $customer = Customer::create($request->all());
        return $this->successResponse(new CustomerResource($customer), Response::HTTP_CREATED);
    }



    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(UpdateCustomerRequest $request, Customer $customer) // {{domain}}/api/customers/{customer} (PUT)
    {
        //
        if ($customer) {
            // Fullname
            if (request()->has('fullname')) {
                $customer->fullname = $request->fullname;
            }
            // Address
            if (request()->has('address')) {
                $customer->address = $request->address;
            }
            // City
            if (request()->has('city')) {
                $customer->city = $request->city;
            }
            // State
            if (request()->has('state')) {
                $customer->state = $request->state;
            }
            // Status
            if (request()->has('status')) {
                $customer->status = $request->status;
            }
            //
            if (!$customer->isDirty()) {
                return $this->errorResponse(__('messages.diff_value'), Response::HTTP_NOT_MODIFIED);
            }
            //
            $customer->save();
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
    public function destroy(Customer $customer) // {{domain}}/api/customers/{customer} (DELETE)
    {
        //
        if ($customer) {
            //
            if ($customer->delete()) {
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
