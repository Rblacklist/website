<?php

namespace Modules\Zone\Http\Controllers\Zones;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Zone\Entities\Zone;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use App\Http\Controllers\ApiController;
use Modules\Zone\Transformers\Zones\ZoneResource;
use Modules\Zone\Transformers\Zones\ZoneCollection;

class ZoneController extends ApiController
{
    public function __construct()
    {
        //
        $this->middleware('role:super-admin|admin|manager|member');
        //
        if (!auth('sanctum')->user()->can('product-all')) {
            $this->middleware('role_or_permission:super-admin|zone-view')->only('index', 'selectingFields');
            $this->middleware('role_or_permission:super-admin|zone-show')->only('show');
            $this->middleware('role_or_permission:super-admin|zone-create')->only('store', 'uploadImage');
            $this->middleware('role_or_permission:super-admin|zone-update')->only('update');
            $this->middleware('role_or_permission:super-admin|zone-delete')->only('destroy');
        }
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        //
        $limit = $request->query->get('limit') ?? 10;
        $offset = $request->query->get('offset') ?? 0;
        //
        $columns = [
            // Zones
            AllowedFilter::exact('id'), 'zone_name'
        ];
        //
        $zones = QueryBuilder::for(Zone::class)
            //filtering
            ->allowedFilters($columns)
            //sorting
            ->defaultSort('id')
            ->allowedSorts([
                // Zones
                'id', 'zone_name',
            ])
            ->limit($limit)->offset($offset * $limit)
            ->get() ?? [];
        //

        return $this->showAll(new ZoneCollection($zones), Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
        try {
            $zone = Zone::create([
                'zone_name' => $request->zone_name,
                'regions' => $request->regions,
            ]);

            if ($zone) {
                return $this->successResponse(new ZoneResource($zone), Response::HTTP_OK);
            } else {
                return $this->errorResponse(trans('messages.resource_cannot_be_created'), Response::HTTP_BAD_REQUEST);
            }
        } catch (Exception $ex) {
            return $this->errorResponse($ex->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show(Zone $zone)
    {
        //
        if ($zone) {
            //
            return $this->showOne(new ZoneResource($zone), Response::HTTP_OK);
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
        $zones = QueryBuilder::for(Zone::class)
            ->allowedFields([
                'id', 'zone_name', 'regions', 'created_at', 'updated_at'
            ])
            ->get();
        return $this->showAll($zones, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, Zone $zone)
    {
        // Zone name
        if ($request->has('zone_name')) {
            $zone->zone_name = $request->zone_name;
        }
        // Regions
        if ($request->has('regions')) {
            $zone->regions = $request->regions;
        }
        //
        $zone->save();
        //
        return $this->successResponse(__('messages.updated_successfully'), Response::HTTP_NO_CONTENT);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy(Zone $zone)
    {
        //

        if ($zone) {
            //
            if ($zone->delete()) {
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
