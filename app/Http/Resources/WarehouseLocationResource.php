<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WarehouseLocationResource extends JsonResource
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
            'aisle' => $this->aisle,
            'bay' => $this->bay,
            'level' => $this->level,
            'warehouse' => $this->warehouse,
            'locationType' => $this->locationType,
            'storageType' => $this->storageType,
            'palletCapacity' => $this->pallet_capacity,
            'barcode' => $this->barcode,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
