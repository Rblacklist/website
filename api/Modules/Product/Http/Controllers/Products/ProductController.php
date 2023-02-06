<?php

namespace Modules\Product\Http\Controllers\Products;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Product\Entities\Product;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use App\Http\Controllers\ApiController;
use Modules\Product\Http\Requests\StoreProductRequest;
use Modules\Product\Http\Requests\UpdateProductRequest;
use Modules\Product\Transformers\Products\ProductResource;
use Modules\Product\Transformers\Products\ProductCollection;

class ProductController extends ApiController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */

    public function index(Request $request) // {{domain}}/api/products (GET)
    {
        //
        $limit = $request->query->get('limit') ?? 10;
        $offset = $request->query->get('offset') ?? 0;
        //
        $columns = [
            // Products
            AllowedFilter::exact('id'), 'name', 'price', 'quantity', 'weight',
            AllowedFilter::scope('status'), 'created_at',
        ];
        //
        $products = QueryBuilder::for(Product::class)
            //filtering
            ->allowedFilters($columns)
            //sorting
            ->defaultSort('id')
            ->allowedSorts([
                // Products
                'id', 'name', 'price', 'quantity',
                'weight', 'created_at',
            ])
            ->limit($limit)->offset($offset * $limit)
            ->get() ?? [];
        //
        return $this->showAll(new ProductCollection($products), Response::HTTP_OK);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show(Product $product) // {{domain}}/api/products/{product} (GET)
    {
        //
        if ($product) {
            //
            return $this->showAll(new ProductResource($product), Response::HTTP_OK);
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
        $products = QueryBuilder::for(Product::class)
            ->allowedFields(['id', 'name', 'price', 'quantity', 'weight', 'status'])
            ->get();
        return $this->showAll($products, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(StoreProductRequest $request) // {{domain}}/api/products (POST)
    {
        //
        $product = Product::create($request->all());
        return $this->successResponse(new ProductResource($product), Response::HTTP_CREATED);
    }



    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param Product $product
     * @return Response
     */
    public function update(UpdateProductRequest $request, Product $product) // {{domain}}/api/products/{product} (PUT)
    {
        //
        if ($product) {
            // name
            if (request()->has('name')) {
                $product->name = $request->name;
            }
            // price
            if (request()->has('price')) {
                $product->price = $request->price;
            }
            // Quantity
            if (request()->has('quantity')) {
                $product->quantity = $request->quantity;
            }
            // Weight
            if (request()->has('weight')) {
                $product->weight = $request->weight;
            }
            // Status
            if (request()->has('status')) {
                $product->status = $request->status;
            }
            //
            if (!$product->isDirty()) {
                return $this->errorResponse(__('messages.diff_value'), Response::HTTP_NOT_MODIFIED);
            }
            //
            $product->save();
            //
            return $this->successResponse(__('messages.updated_successfully'), Response::HTTP_NO_CONTENT);
        }
        //
        return $this->errorResponse(__('messages.recource_cannot_be_found'), Response::HTTP_NOT_FOUND);
    }

    /**
     * Remove the specified resource from storage.
     * @param Product $product
     * @return Response
     */
    public function destroy(Product $product) // {{domain}}/api/products/{product} (DELETE)
    {
        //
        if ($product) {
            //
            if ($product->delete()) {
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
