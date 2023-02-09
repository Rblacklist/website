<?php

namespace Modules\Order\Http\Controllers\ProductsOrder;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use App\Http\Controllers\ApiController;
use Modules\Order\Entities\ProductsOrder;
use Modules\Order\Transformers\ProductsOrder\ProductsOrderResource;
use Modules\Order\Transformers\ProductsOrder\ProductsOrderCollection;
use Modules\Order\Http\Requests\ProductsOrder\UpdateProductsOrderRequest;

class ProductsOrderController extends ApiController
{
    public function __construct()
    {
        $this->middleware('role:super-admin');
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */

    public function index(Request $request) // {{domain}}/api/products-order (GET)
    {
        //
        $limit = $request->query->get('limit') ?? 10;
        $offset = $request->query->get('offset') ?? 0;
        //
        $columns = [
            // Products_order
            AllowedFilter::exact('id'), 'price', 'quantity',
            AllowedFilter::scope('status'), 'created_at',
        ];
        //
        $customers = QueryBuilder::for(ProductsOrder::class)
            //filtering
            ->allowedFilters($columns)
            //sorting
            ->defaultSort('id')
            ->allowedSorts([
                // Products_order
                'id', 'price', 'quantity',
                //Product
                'products.id', 'products.name', 'products.price', 'products.quantity', 'products.weight'
            ])
            ->limit($limit)->offset($offset * $limit)
            ->get() ?? [];
        //
        return $this->showAll(new ProductsOrderCollection($customers), Response::HTTP_OK);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show(ProductsOrder $productsOrder) // {{domain}}/api/products-order/{products_order} (GET)
    {
        //
        if ($productsOrder) {
            //
            return $this->showOne(new ProductsOrderResource($productsOrder), Response::HTTP_OK);
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
        $productsOrder = QueryBuilder::for(ProductsOrder::class)
            ->allowedFields([ // Products_order
                'id', 'price', 'quantity', 'status', 'created_at', 'updated_at',
                //Product
                'products.id', 'products.name', 'products.price', 'products.quantity',
                'products.weight', 'products.status', 'products.created_at', 'products.updated_at',
            ])
            ->allowedIncludes('phones')
            ->get();
        return $this->showAll($productsOrder, Response::HTTP_OK);
    }


    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(UpdateProductsOrderRequest $request, ProductsOrder $productsOrder) // {{domain}}/api/customers/{products_order} (PUT)
    {
        //
        if ($productsOrder) {
            // price
            if (request()->has('price')) {
                $productsOrder->price = $request->price;
            }
            // quantity
            if (request()->has('quantity')) {
                $productsOrder->quantity = $request->quantity;
            }
            // order_id
            if (request()->has('order_id')) {
                $productsOrder->order_id = $request->order_id;
            }
            // State
            if (request()->has('product_id')) {
                $productsOrder->product_id = $request->product_id;
            }
            // Status
            if (request()->has('status')) {
                $productsOrder->status = $request->status;
            }
            //
            if (!$productsOrder->isDirty()) {
                return $this->errorResponse(__('messages.diff_value'), Response::HTTP_NOT_MODIFIED);
            }
            //
            $productsOrder->save();
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
    public function destroy(ProductsOrder $productsOrder) // {{domain}}/api/customers/{products_order} (DELETE)
    {
        //productsOrder
        if ($productsOrder) {
            //
            if ($productsOrder->delete()) {
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
