<?php

namespace App\Services;

use App\Models\Supply;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class SupplyService
{
    public function getById($id): Supply
    {
        return Supply::find($id);
    }

    public function getList(Request $request): Collection
    {
        $status = $request->get('status');

        $query = Supply::query();
        if ($status) {
            $query = $query->where('status', $status);
        }

        return $query->get();
    }

    public function updateStatus(int $id, string $status): void
    {
        $supply = Supply::find($id);
        $supply->status = $status;

        if ($status === Supply::STATUS_ARRIVED) {
            $supply->arrival_date = date('Y-m-d H:i:s');
        }

        if ($status === Supply::STATUS_UNLOADING) {
        }

        $supply->save();
    }
}
