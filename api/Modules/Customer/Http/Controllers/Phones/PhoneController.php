<?php

namespace Modules\Customer\Http\Controllers\Phones;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Customer\Entities\Phone;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use App\Http\Controllers\ApiController;
use Modules\User\Http\Requests\StorePhoneRequest;
use Modules\User\Http\Requests\UpdatePhoneRequest;
use Modules\Customer\Transformers\Phones\PhoneResource;
use Modules\Customer\Transformers\Phones\PhoneCollection;

class PhoneController extends ApiController
{
    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) // {{domain}}/api/phones (GET)
    {
        //
        $limit = $request->query->get('limit') ?? 10;
        $offset = $request->query->get('offset') ?? 0;
        //
        $columns = [
            // Phones
            AllowedFilter::exact('id'), 'code', 'phone', 'created_at'
        ];
        //
        $phones = QueryBuilder::for(Phone::class)
            //filtering
            ->allowedFilters($columns)
            //sorting
            ->defaultSort('id')
            ->allowedSorts([
               'id', 'code', 'phone', 'created_at'
            ])
            ->limit($limit)->offset($offset * $limit)
            ->get() ?? [];
        //
        return $this->showAll(new PhoneCollection($phones), Response::HTTP_OK);
    }

    /**
     * Show the specified resource.
     * @param Phone $phone
     * @return Response
     */
    public function show(Phone $phone) // {{domain}}/api/phones/{phone} (GET)
    {
        //
        if ($phone) {
            //
            return $this->showAll(new PhoneResource($phone), Response::HTTP_OK);
        }
        //
        return $this->errorResponse(__('messages.recource_cannot_be_found'), Response::HTTP_NOT_FOUND);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function selectingFields() // {{domain}}/api/selecting-fields/phones?fields[phones]=id,phone (GET)
    {
        $phones = QueryBuilder::for(Phone::class)
            ->allowedFields(['id', 'code', 'phone'])
            ->get();
        return $this->showAll($phones, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     * @param StorePhoneRequest $request
     * @return Response
     */
    public function store(StorePhoneRequest $request) // {{domain}}/api/customers (POST)
    {
        //
        $phone = Phone::create($request->all());
        return $this->successResponse(new PhoneResource($phone), Response::HTTP_CREATED);
    }

    /**
     * Update the specified resource in storage.
     * @param UpdatePhoneRequest $request
     * @param Phone $phone
     * @return Response
     */
    public function update(UpdatePhoneRequest $request, Phone $phone) // {{domain}}/api/phones/{phone} (PUT)
    {
        //
        if ($phone) {
            // code
            if (request()->has('code')) {
                $phone->code = $request->code;
            }
            // Phone
            if (request()->has('phone')) {
                $phone->phone = $request->phone;
            }

            // customer_id
            if (request()->has('customer_id')) {
                $phone->customer_id = $request->customer_id;
            }
            //
            if (!$phone->isDirty()) {
                return $this->errorResponse(__('messages.diff_value'), Response::HTTP_NOT_MODIFIED);
            }
            //
            $phone->save();
            //
            return $this->successResponse(__('messages.updated_successfully'), Response::HTTP_NO_CONTENT);
        }
        //
        return $this->errorResponse(__('messages.recource_cannot_be_found'), Response::HTTP_NOT_FOUND);
    }

    /**
     * Update the specified resource in storage.
     * @param UpdatePhoneRequest $request
     * @param $customerId
     * @param $phoneNumber
     * @return Response
     */
    public function updatePhoneByCustomer(UpdatePhoneRequest $request, $customerId, $phoneNumber) // {{domain}}/api/customer/{customerId}/phones/{phoneNumber} (PUT)
    {
        //
        $cstPh = Phone::where([
            'customer_id' =>  $customerId,
            'phone' => $phoneNumber
        ])->first();

        //
        if ($cstPh) {
            // Code
            if (request()->has('code')) {
                $cstPh->code = $request->code;
            }
            // Phone
            if (request()->has('phone')) {
                $cstPh->phone = $request->phone;
            }
            //
            if (!$cstPh->isDirty()) {
                return $this->errorResponse(__('messages.diff_value'), Response::HTTP_NOT_MODIFIED);
            }
            //
            $cstPh->save();

            return $this->successResponse(__('messages.updated_successfully'), Response::HTTP_NO_CONTENT);
        }
        //
        return $this->errorResponse(__('messages.recource_cannot_be_found'), Response::HTTP_NOT_FOUND);
    }

    /**
     * Remove the specified resource from storage.
     * @param Phone $phone
     * @return Response
     */
    public function destroy(Phone $phone) // {{domain}}/api/phones/{phone} (DELETE)
    {
        //
        if ($phone) {
            //
            if ($phone->delete()) {
                //
                return $this->successResponse(__('messages.deleted_successfully'), Response::HTTP_NO_CONTENT);
            }
            //
            return $this->errorResponse(__('messages.resource_cannot_be_deleted'), Response::HTTP_CONFLICT);
        }
        //
        return $this->errorResponse(__('messages.recource_cannot_be_found'), Response::HTTP_NOT_FOUND);
    }


    /**
     * Remove the specified resource from storage.
     * @param int $customerId
     * @return Response
     */
    public function destroyByCustomer($customerId) // {{domain}}/api/customer/{customerId}/phones (DELETE)
    {
        //
        if (!empty($customerId) && Phone::where('customer_id', $customerId)->exists()) {
            //
            $phone = Phone::where('customer_id', $customerId)->delete();
            //
            if ($phone) {
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
