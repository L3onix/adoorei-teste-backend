<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SaleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'sales_id' => $this->sales_id,
            'amount' => $this->total_price,
            'products' => ProductSaleResource::collection($this->whenLoaded('products'))
        ];
    }
}
