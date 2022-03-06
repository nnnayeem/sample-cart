<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\CheckoutRequest;
use App\Http\Resources\OrderResource;
use App\Services\Order\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class OrderController extends Controller
{
    public function checkout(CheckoutRequest $request)
    {
        $order = (new OrderService())->checkout($request->validated());

        if(!empty($order)) return Response::success('Order created successfully', new OrderResource($order));

        return Response::fail('Order could not be created');
    }

    public function history()
    {
    }
}
