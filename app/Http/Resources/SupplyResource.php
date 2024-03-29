<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SupplyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $products = $this->supplyProducts;
        $mappedProducts = [];
        foreach ($products as $product) {
            $mappedProducts[] = [
                'name' => $product['name'],
                'quantity' => $product['pivot']['quantity'],
            ];
        }

        return [
            'id' => $this->id,
            'status' => $this->status,
            'arrival_date' => $this->arrival_date,
            'supplier_name' => $this->supplier_name,
            'warehouse_location' => $this->warehouseLocation,
            'supply_pallets' => SupplyPalletResource::collection($this->supplyPallets),
            'products' => $mappedProducts,
            'created_at' => $this->created_at
        ];
    }
}
