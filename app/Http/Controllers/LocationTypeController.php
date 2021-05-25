<?php

namespace App\Http\Controllers;

use App\Models\LocationType;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LocationTypeController extends Controller
{
    public function getList(): JsonResponse
    {
        return response()->json([
            'items' => LocationType::all()
        ]);
    }
}
