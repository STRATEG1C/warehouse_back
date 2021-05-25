<?php

namespace App\Http\Controllers;

use App\Models\StorageType;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StorageTypeController extends Controller
{
    public function getList(): JsonResponse
    {
        return response()->json([
            'items' => StorageType::all()
        ]);
    }
}
