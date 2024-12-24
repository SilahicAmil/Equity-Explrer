<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StockResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // Only return
        return [
            'stock_name' => $this->stock_name,
            'stock_sector' => $this->stockSector->stock_sector,  // Use stockSector here
            'current_price' => $this->current_price,
            'symbol' => $this->symbol
        ];
    }
}
