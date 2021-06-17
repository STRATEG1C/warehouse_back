<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderResource;
use App\Services\OrderService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function getList(Request $request, OrderService $service): JsonResponse
    {
        $orders = $service->getList($request);
        return response()->json([
            'items' => OrderResource::collection($orders),
        ]);
    }

    public function getById($id, OrderService $service): JsonResponse
    {
        return response()->json([
            'item' => new OrderResource($service->getById($id))
        ]);
    }

    public function update($id, Request $request, OrderService $service): JsonResponse
    {
        $service->update($id, $request);
        return response()->json([
            'result' => 'Success'
        ]);
    }
}
