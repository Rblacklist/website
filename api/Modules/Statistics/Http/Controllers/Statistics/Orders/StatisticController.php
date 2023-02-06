<?php

namespace Modules\Statistics\Http\Controllers\Statistics\Orders;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Order\Entities\Order;
use Illuminate\Routing\Controller;
use App\Http\Controllers\ApiController;

class StatisticController extends ApiController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function orders()
    {
        //
        $StatisticOrder = [
            'all_orders' => Order::count(),
            'pending_orders' => Order::status(1)->count(),
            'failed_one_orders' => Order::status(2)->count(),
            'failed_two_orders' => Order::status(3)->count(),
            'failed_three_orders' => Order::status(4)->count(),
            'confirme_orders' => Order::status(5)->count(),
            'cancelled_orders' => Order::status(6)->count(),

        ];

        return $this->successResponse(['data' => $StatisticOrder], Response::HTTP_OK);
    }

    public function betweenTwoDates(Request $request)
    {
        $request->validate([
            'from' => 'required|date',
            'to' => 'required|date',
        ]);
        $StatisticOrder = [
            'all_orders' => Order::betweenTwoDates($request)->count(),
            'pending_orders' => Order::betweenTwoDates($request)->status(1)->count(),
            'failed_one_orders' => Order::betweenTwoDates($request)->status(2)->count(),
            'failed_two_orders' => Order::betweenTwoDates($request)->status(3)->count(),
            'failed_three_orders' => Order::betweenTwoDates($request)->status(4)->count(),
            'confirme_orders' => Order::betweenTwoDates($request)->status(5)->count(),
            'cancelled_orders' => Order::betweenTwoDates($request)->status(6)->count(),

        ];

        return $this->successResponse(['data' => $StatisticOrder], Response::HTTP_OK);
    }
}
