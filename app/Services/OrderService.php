<?php

namespace App\Services;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderService
{
    public function getList(Request $request)
    {
        $page = $request->get('page');
        $limit = $request->get('limit');

        return Order::orderBy('id', 'desc')->get();
    }

    public function getById($id)
    {
        return Order::where('id', $id)->first();
    }

    public function update($id, Request $request)
    {
        $updatedItem = Order::find($id);
        $updatedItem->status = $request['status'];
        $updatedItem->save();
    }
}
