<?php

namespace App\Http\Controllers;

use App\Http\Resources\WarehouseLocationResource;
use App\Services\WarehouseLocationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class WarehouseLocationController extends Controller
{
    public function getList(Request $request, WarehouseLocationService $service): JsonResponse
    {
        $locations = $service->getList($request);
        return response()->json([
            'items' => WarehouseLocationResource::collection($locations)
        ]);
    }

    public function getById($id, WarehouseLocationService $service): JsonResponse
    {
        return response()->json([
            'item' => new WarehouseLocationResource($service->getById($id))
        ]);
    }

    public function create(Request $request, WarehouseLocationService $service): JsonResponse
    {
        $service->create($request);
        return response()->json([
            'result' => 'Success'
        ]);
    }

    public function update($id, Request $request, WarehouseLocationService $service): JsonResponse
    {
        $service->update($id, $request);
        return response()->json([
            'result' => 'Success'
        ]);
    }

    public function delete(Request $request, WarehouseLocationService $service): JsonResponse
    {
        $service->deleteMany($request);
        return response()->json([
            'result' => 'Success'
        ]);
    }
}
