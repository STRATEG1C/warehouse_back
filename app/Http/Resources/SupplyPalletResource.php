<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SupplyPalletResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'product' => $this->product,
            'warehouse_location' => $this->warehouseLocation,
            'supply_id' => $this->supply_id,
            'quantity' => $this->quantity,
            'loaded_quantity' => $this->loaded_quantity,
        ];
    }
}
