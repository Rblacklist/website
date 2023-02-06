<?php

namespace Modules\Source\Http\Controllers\TypeSources;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use App\Http\Controllers\ApiController;
use Modules\Source\Entities\TypeSource;
use Modules\Source\Transformers\Types\TypeSourceResource;
use Modules\Source\Transformers\Types\TypeSourceCollection;
use Modules\Source\Http\Requests\TypeSource\StoreTypeSourceRequest;
use Modules\Source\Http\Requests\TypeSource\UpdateTypeSourceRequest;

class TypeSourceController extends ApiController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */

    public function index(Request $request) // {{domain}}/api/type-source (GET)
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
        $typeSource = QueryBuilder::for(TypeSource::class)
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
        return $this->showAll(new TypeSourceCollection($typeSource), Response::HTTP_OK);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show(TypeSource $typeSource) // {{domain}}/api/type-source/{type_source} (GET)
    {
        //
        if ($typeSource) {
            //
            return $this->showOne(new TypeSourceResource($typeSource), Response::HTTP_OK);
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
    public function store(StoreTypeSourceRequest $request) // {{domain}}/api/type-source (POST)
    {
        //
        $typeSource = TypeSource::create($request->all());
        return $this->successResponse(new TypeSourceResource($typeSource), Response::HTTP_CREATED);
    }



    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(UpdateTypeSourceRequest $request, TypeSource $typeSource) // {{domain}}/api/type-source/{type_source} (PUT)
    {
        //
        if ($typeSource) {
            // name
            if (request()->has('name')) {
                $typeSource->name = $request->name;
            }
            // status
            if (request()->has('status')) {
                $typeSource->status = $request->status;
            }
            //
            if (!$typeSource->isDirty()) {
                return $this->errorResponse(__('messages.diff_value'), Response::HTTP_NOT_MODIFIED);
            }
            //
            $typeSource->save();
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
    public function destroy(TypeSource $typeSource) // {{domain}}/api/type-source/{type_source} (DELETE)
    {
        //
        if ($typeSource) {
            //
            if ($typeSource->delete()) {
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
