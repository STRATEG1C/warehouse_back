<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $products = $this->orderedProducts;
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
            'created_date' => $this->created_date,
            'shipping_date' => $this->shipping_date,
            'products' => $mappedProducts,
        ];
    }
}
