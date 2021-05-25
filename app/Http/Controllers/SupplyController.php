<?php

namespace App\Http\Controllers;

use App\Http\Resources\SupplyResource;
use App\Services\SupplyService;
use App\Services\UnloadingService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SupplyController extends Controller
{
    public function getList(Request $request, SupplyService $service): JsonResponse
    {
        return response()->json([
            'items' => SupplyResource::collection($service->getList($request)),
        ]);
    }

    public function updateStatus(Request $request, int $id, string $status, SupplyService $service): JsonResponse
    {
        $service->updateStatus($id, $status);
        return response()->json([
            'status' => 'SUCCESS',
        ]);
    }

    public function getById(Request $request, int $id, SupplyService $service): JsonResponse
    {
        return response()->json([
           'item' => new SupplyResource($service->getById($id)),
        ]);
    }

    public function startUnloading(Request $request, int $id, UnloadingService $service): JsonResponse
    {
        $service->startUnloading($id, $request);
        return response()->json([
            'status' => 'Success',
        ]);
    }

    public function unloadPallet(Request $request, int $supplyId, int $palletId, UnloadingService $service): JsonResponse
    {
        $service->unloadPallet($supplyId, $palletId, $request->get('quantity'));
        return response()->json([
            'status' => 'SUCCESS',
        ]);
    }
}
