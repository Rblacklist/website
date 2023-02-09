<?php

namespace Modules\Source\Http\Controllers\Sources;

use Exception;
use App\Traits\UploadImages;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Source\Entities\Source;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use App\Http\Controllers\ApiController;
use Modules\Source\Transformers\Sources\SourceResource;
use Modules\Source\Transformers\Sources\SourceCollection;
use Modules\Source\Http\Requests\Sources\StoreSourceRequest;
use Modules\Source\Http\Requests\Sources\UpdateSourceRequest;

class SourceController extends ApiController
{
    //
    private $urlAvatar = 'images/sources/';

    //
    public function __construct()
    {
        //
        $this->middleware('role:super-admin|admin|manager|member');
        //
        if (!auth('sanctum')->user()->can('source-all')) {
            $this->middleware('role_or_permission:super-admin|source-view')->only('index', 'selectingFields');
            $this->middleware('role_or_permission:super-admin|source-show')->only('show');
            $this->middleware('role_or_permission:super-admin|source-create')->only('store', 'uploadAvatar');
            $this->middleware('role_or_permission:super-admin|source-update')->only('update');
            $this->middleware('role_or_permission:super-admin|source-delete')->only('destroy');
        }
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */

    public function index(Request $request) // {{domain}}/api/sources (GET)
    {
        //
        $limit = $request->query->get('limit') ?? 10;
        $offset = $request->query->get('offset') ?? 0;
        //
        $columns = [
            // Sources
            AllowedFilter::exact('id'), 'name', 'base_url',
            AllowedFilter::scope('status'), 'created_at',
        ];
        //
        $sources = QueryBuilder::for(Source::class)
            //filtering
            ->allowedFilters($columns)
            //sorting
            ->defaultSort('id')
            ->allowedSorts([
                // Sources
                'id', 'name', 'base_url', 'status', 'created_at',
            ])
            ->limit($limit)->offset($offset * $limit)
            ->get() ?? [];
        //
        return $this->showAll(new SourceCollection($sources), Response::HTTP_OK);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show(Source $source) // {{domain}}/api/sources/{source} (GET)
    {
        //
        if ($source) {
            //
            return $this->showAll(new SourceResource($source), Response::HTTP_OK);
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
        $sources = QueryBuilder::for(Source::class)
            ->allowedFields(['id', 'name', 'base_url', 'status', 'created_at',])
            ->get();
        return $this->showAll($sources, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(StoreSourceRequest $request) // {{domain}}/api/sources (POST)
    {
        //
        $source = Source::create($request->all());
        return $this->successResponse(new SourceResource($source), Response::HTTP_CREATED);
    }


    public function uploadAvatar(Request $request, Source $source)
    {
        try {
            $validated = $request->validate([
                'avatar' => 'required|mimes:png,jpeg,jpg,webp|image',
            ]);
            if ($validated) {
                $source->avatar = UploadImages::file($request->file('avatar'), $this->urlAvatar);
                $source->save();
                return $this->successResponse(trans('messages.updated_successfully'), Response::HTTP_NO_CONTENT);
            }
            return $this->errorResponse(trans('messages.resource_cannot_be_updated'), Response::HTTP_BAD_REQUEST);
        } catch (Exception $ex) {
            return $this->errorResponse($ex->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(UpdateSourceRequest $request, Source $source) // {{domain}}/api/sources/{source} (PUT)
    {
        //
        if ($source) {
            // name
            if (request()->has('name')) {
                $source->name = $request->name;
            }
            // base_url
            if (request()->has('base_url')) {
                $source->base_url = $request->base_url;
            }

            // data
            if (request()->has('data')) {
                $source->data = $request->data;
            }

            // status
            if (request()->has('status')) {
                $source->status = $request->status;
            }
            //
            if (!$source->isDirty()) {
                return $this->errorResponse(__('messages.diff_value'), Response::HTTP_NOT_MODIFIED);
            }
            //
            $source->save();
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
    public function destroy(Source $source) // {{domain}}/api/sources/{source} (DELETE)
    {
        //
        if ($source) {
            //
            if ($source->delete()) {
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
