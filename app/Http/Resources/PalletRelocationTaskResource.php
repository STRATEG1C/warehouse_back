<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PalletRelocationTaskResource extends JsonResource
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
            'type' => $this->type,
            'supply_pallet' => SupplyPalletResource::collection($this->containerPallets)
        ];
    }
}
