<?php

namespace App\Http\Controllers;

use App\Http\Resources\TaskAssignmentResource;
use App\Models\TaskAssignment;
use App\Services\TaskService;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserController extends Controller
{
    public function getList(Request $request, UserService $service): JsonResponse
    {
        return response()->json([
            'items' => $service->getList($request),
        ]);
    }

    public function getTaskAssignments(Request $request, TaskService $service): JsonResponse
    {
        return response()->json([
            'items' => TaskAssignmentResource::collection($service->getTaskAssignmentsForUser($request)),
        ]);
    }

    public function getTaskAssignment(Request $request, int $id, TaskService $service): JsonResponse
    {
        return response()->json([
            'item' => new TaskAssignmentResource($service->getTaskAssignment($id)),
        ]);
    }

    public function finishTask(Request $request, int $id, TaskService $service): JsonResponse
    {
        $service->finishTaskAssignment($id);
        return response()->json([
            'status' => 'SUCCESS',
        ]);
    }
}
