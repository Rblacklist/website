<?php

namespace Modules\Order\Http\Controllers\Orders;

use Exception;
use PDOException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Order\Entities\Order;
use Illuminate\Support\Facades\Http;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use App\Http\Controllers\ApiController;
use Modules\Order\Entities\ProductsOrder;
use Modules\Order\Transformers\Orders\OrderResource;
use Modules\Order\Transformers\Orders\OrderCollection;
use Modules\Order\Http\Requests\Orders\StoreOrderRequest;
use Modules\Order\Http\Requests\Orders\UpdateOrderRequest;

class OrderController extends ApiController
{


    /**
     * Display a listing of the resource.
     * @return Response
     */

    private $total = 0;
    private $user = null;


    public function __construct()
    {
        //
        $this->user = auth('sanctum')->user();
        //
        $this->middleware('role:super-admin|admin|manager|member');
        //
        if (!auth('sanctum')->user()->can('order-all')) {
            $this->middleware('role_or_permission:super-admin|order-view')->only('index', 'selectingFields');
            $this->middleware('role_or_permission:super-admin|order-show')->only('show');
            $this->middleware('role_or_permission:super-admin|order-create')->only('store');
            $this->middleware('role_or_permission:super-admin|order-update')->only('update');
            $this->middleware('role_or_permission:super-admin|order-delete')->only('destroy');
        }
    }

    public function index(Request $request) // {{domain}}/api/orders (GET)
    {
        //
        $limit = $request->query->get('limit') ?? 10;
        $offset = $request->query->get('offset') ?? 0;
        //
        $columns = [
            // Orders
            AllowedFilter::exact('id'), 'order_number', 'delivery_type', 'note', 'order_total',
            'is_sent', 'created_at', 'updated_at',

            // customers
            'customers.id', 'customers.fullname', 'customers.address', 'customers.city',
            'customers.state', 'customers.created_at',

            // sources
            'sources.id', 'sources.name', 'sources.base_url', 'sources.created_at',

            // delivery company
            'delivery_companies.id', 'delivery_companies.name', 'delivery_companies.base_url',
            'delivery_companies.created_at',

            // Products
            'products.id', 'products.name', 'products.price', 'products.quantity',
            'products.created_at', 'products.updated_at',

            //Products_order
            'proudcts_order.id', 'products_order.price', 'products_order.quantity',
            'proudcts_order.created_at', 'proudcts_order.updated_at',

        ];
        //
        $typeSource = QueryBuilder::for(Order::class)
            //filtering
            ->allowedFilters($columns)
            //sorting
            ->defaultSort('id')
            ->allowedSorts([
                // Sources
                'id', 'order_number', 'delivery_type', 'note', 'order_total',
                'is_sent', 'created_at', 'updated_at',
            ])
            ->limit($limit)->offset($offset * $limit)
            ->get() ?? [];
        //
        return $this->showAll(new OrderCollection($typeSource), Response::HTTP_OK);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show(Order $order) // {{domain}}/api/orders/{order} (GET)
    {
        //
        if ($order) {
            //
            return $this->showOne(new OrderResource($order), Response::HTTP_OK);
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
            ->allowedFields([
                'id', 'order_number', 'delivery_type', 'note', 'order_total',
                'is_sent', 'created_at', 'updated_at'
            ])
            ->get();
        return $this->showAll($typeSource, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(StoreOrderRequest $request) // {{domain}}/api/orders (POST)
    {
        // caluclate Total Products
        $this->caluclateTotalProducts($request->products);

        $order = $this->storeOrder($request);

        if ($order) {
            // caluclate Total Products
            $this->productsOrder($request->products, $order->id);
            return $this->successResponse(new OrderResource($order), Response::HTTP_CREATED);
        }
        return $this->errorResponse(trans('messages.resource_cannot_be_created'), Response::HTTP_BAD_REQUEST);
    }


    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(UpdateOrderRequest $request, Order $order) // {{domain}}/api/orders/{order} (PUT)
    {
        //
        if ($order) {
            // order_number
            if (request()->has('order_number')) {
                $order->name = $request->name;
            }
            // order_total
            if (request()->has('order_total')) {
                $order->order_total = $request->order_total;
            }

            // customer_id
            if (request()->has('customer_id')) {
                $order->customer_id = $request->customer_id;
            }

            // source_id
            if (request()->has('source_id')) {
                $order->source_id = $request->source_id;
            }

            // store_id
            if (request()->has('store_id')) {
                $order->store_id = $request->store_id;
            }

            // delivery_company_id
            if (request()->has('delivery_company_id')) {
                $order->delivery_company_id = $request->delivery_company_id;
            }

            // delivery_type
            if (request()->has('delivery_type')) {
                $order->delivery_type = $request->delivery_type;
            }

            // is_sent
            if (request()->has('is_sent')) {
                $order->is_sent = $request->is_sent;
            }

            // status order (id)
            if (request()->has('status_order_id')) {
                $order->status_order_id = $request->status_order_id;
            }


            //
            if (!$order->isDirty()) {
                return $this->errorResponse(__('messages.diff_value'), Response::HTTP_NOT_MODIFIED);
            }

            $order->edited_by = $this->user->id ?? 0;
            //
            $order->save();
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
    public function destroy(Order $order) // {{domain}}/api/orders/{status_order} (DELETE)
    {
        //
        if ($order) {
            //
            if ($order->delete()) {
                //
                return $this->successResponse(__('messages.deleted_successfully'), Response::HTTP_NO_CONTENT);
            }
            //
            return $this->errorResponse(__('messages.resource_cannot_be_deleted'), Response::HTTP_CONFLICT);
        }
        //
        return $this->errorResponse(__('messages.recource_cannot_be_found'), Response::HTTP_NOT_FOUND);
    }

    // --------------------------Helper Methods------------------------------------------

    // Generate Number of order
    private function generateNumberOrder()
    {
        // Take the order number
        $order = Order::select('order_number')->orderBy('id', 'DESC')->first();

        if (!empty($order)) {
            $newOrderNumber = intval($order->order_number) + 1;
        } else {
            $newOrderNumber = 1;
        }

        return $newOrderNumber;
    }

    // caluclate Total of products
    private function caluclateTotalProducts($products)
    {
        foreach ($products as $product) {
            $this->total += floatval($product['price']) * intval($product['quantity']);
        }
    }

    // Product order
    private function productsOrder($products, $orderId)
    {
        try {
            $data = [];
            foreach ($products as $product) {
                $data[] = [
                    'order_id' => $orderId,
                    'product_id' => $product['product_id'],
                    'price' => $product['price'],
                    'quantity' => $product['quantity'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            if (count($data) > 0) {
                ProductsOrder::insert($data);
                return true;
            }

            return false;
        } catch (Exception $ex) {
            return false;
        }
    }

    // Create a new order
    private function storeOrder($request)
    {
        try {
            if(is_array($request->all())){

            } else{
                $order = Order::create([
                    'order_number' =>  sprintf("%06d", $this->generateNumberOrder()),
                    'delivery_type' => $request->delivery_type,
                    'cusomter_id' => $request->cusomter_id,
                    'store_id' => $request->store_id,
                    'source_id' => $request->source_id,
                    'note' => $request->note,
                    'delivery_company_id' => $request->delivery_company_id,
                    'is_sent' => $request->is_sent,
                    'status_order_id' => $request->status_order_id ?? 1,
                    'order_total' => $this->total
                ]);
                return $order;
            }
        } catch (PDOException $ex) {
            return $this->errorResponse($ex->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        } catch (Exception $ex) {
            return $this->errorResponse($ex->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
